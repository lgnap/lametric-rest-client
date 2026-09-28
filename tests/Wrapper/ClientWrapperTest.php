<?php

namespace LGnap\Tests\Wrapper;

use Http\Discovery\ClassDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Mock\Client as MockClient;
use LGnap\OpenAPIClient\Exception\GetDeviceNotFoundException;
use LGnap\OpenAPIClient\Exception\UpdateScreenUnprocessableEntityException;
use LGnap\OpenAPIClient\Model\Device;
use LGnap\OpenAPIClient\Model\Screen;
use LGnap\OpenAPIClient\Model\ScreenUpdate;
use LGnap\Tests\MockClientStrategy;
use LGnap\Wrapper\ClientWrapper;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * Vérifie le wrapper et le code généré (Jane) sans réseau : les réponses
 * viennent d'un client HTTP simulé, les requêtes envoyées sont inspectées.
 * Le client simulé passe par la discovery PSR-18 (et non par un paramètre)
 * pour que ces tests tournent à l'identique avant et après la migration PHP 8.
 */
class ClientWrapperTest extends TestCase
{
    private MockClient $http;

    protected function setUp(): void
    {
        $this->http = new MockClient();
        MockClientStrategy::$client = $this->http;
        Psr18ClientDiscovery::prependStrategy(MockClientStrategy::class);
        ClassDiscovery::clearCache();
    }

    protected function tearDown(): void
    {
        MockClientStrategy::$client = null;
        ClassDiscovery::clearCache();
    }

    private static function json(int $status, $body): Response
    {
        return new Response($status, ['Content-Type' => 'application/json'], json_encode($body));
    }

    public function testListMyDevicesProdUrlBasicAuthEtDesérialisation(): void
    {
        $this->http->addResponse(self::json(200, [
            ['id' => 19, 'name' => 'salon', 'user_id' => 3],
            ['id' => 20, 'name' => 'bureau', 'user_id' => 3],
        ]));

        $devices = ClientWrapper::createProdClient('jeton', 'v2')->listMyDevices();

        $request = $this->http->getLastRequest();
        self::assertSame('GET', $request->getMethod());
        self::assertSame('https://lametric.helpcomputer.org/v2/devices/mine', (string) $request->getUri());
        self::assertSame('Basic ' . base64_encode('jeton:'), $request->getHeaderLine('Authorization'));

        self::assertCount(2, $devices);
        self::assertContainsOnlyInstancesOf(Device::class, $devices);
        self::assertSame(19, $devices[0]->getId());
        self::assertSame('salon', $devices[0]->getName());
        self::assertSame(3, $devices[0]->getUserId());
    }

    public function testDevClientCibleLocalhost(): void
    {
        $this->http->addResponse(self::json(200, []));

        ClientWrapper::createDevClient('jeton', 'v2')->listMyDevices();

        self::assertSame('http://localhost:8000/v2/devices/mine', (string) $this->http->getLastRequest()->getUri());
    }

    public function testListScreensPasseDeviceIdEnQuery(): void
    {
        $this->http->addResponse(self::json(200, [['id' => 7, 'icon' => 5400, 'text' => 'OK']]));

        $screens = ClientWrapper::createProdClient('jeton', 'v2')->listScreens(['device_id' => 19]);

        $uri = $this->http->getLastRequest()->getUri();
        self::assertSame('/v2/screens', $uri->getPath());
        self::assertSame('device_id=19', $uri->getQuery());
        self::assertInstanceOf(Screen::class, $screens[0]);
        self::assertSame('OK', $screens[0]->getText());
        self::assertSame(5400, $screens[0]->getIcon());
    }

    public function testCreateScreenEnvoieLeCorpsJson(): void
    {
        $this->http->addResponse(self::json(200, ['id' => 42]));

        ClientWrapper::createProdClient('jeton', 'v2')->createScreen(
            (new ScreenUpdate())->setIcon(5400)->setText('LM ENDPOINT déployé'),
            ['device_id' => 19]
        );

        $request = $this->http->getLastRequest();
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v2/screens', $request->getUri()->getPath());
        self::assertSame('device_id=19', $request->getUri()->getQuery());
        self::assertStringContainsString('application/json', $request->getHeaderLine('Content-Type'));
        self::assertSame(
            ['icon' => 5400, 'text' => 'LM ENDPOINT déployé'],
            json_decode((string) $request->getBody(), true)
        );
    }

    public function testUpdateScreen(): void
    {
        $this->http->addResponse(self::json(200, ['id' => 7, 'icon' => 5141, 'text' => 'KO']));

        $screen = ClientWrapper::createProdClient('jeton', 'v2')->updateScreen(
            7,
            (new ScreenUpdate())->setIcon(5141)->setText('KO'),
            ['device_id' => 19]
        );

        $request = $this->http->getLastRequest();
        self::assertSame('PUT', $request->getMethod());
        self::assertSame('/v2/screens/7', $request->getUri()->getPath());
        self::assertSame(['icon' => 5141, 'text' => 'KO'], json_decode((string) $request->getBody(), true));
        self::assertSame(7, $screen->getId());
    }

    public function testErreur404LeveUneExceptionTypee(): void
    {
        $this->http->addResponse(self::json(404, ['name' => 'Not Found', 'message' => 'absent', 'code' => 0, 'status' => 404]));

        $this->expectException(GetDeviceNotFoundException::class);
        ClientWrapper::createProdClient('jeton', 'v2')->getDevice(999);
    }

    public function testErreur422LeveUneExceptionDeValidation(): void
    {
        $this->http->addResponse(self::json(422, [['field' => 'text', 'message' => 'Text cannot be blank.']]));

        try {
            ClientWrapper::createProdClient('jeton', 'v2')
                ->updateScreen(7, (new ScreenUpdate())->setIcon(1)->setText(''), ['device_id' => 19]);
            self::fail('exception attendue');
        } catch (UpdateScreenUnprocessableEntityException $e) {
            self::assertSame(422, $e->getCode());
            $errors = $e->getErrorValidationItemList();
            self::assertSame('text', $errors[0]->getField());
            self::assertSame('Text cannot be blank.', $errors[0]->getMessage());
        }
    }
}
