<?php

namespace LGnap\OpenAPIClient;

class Client extends \LGnap\OpenAPIClient\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListDevicesUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListDevicesForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device[]|\Psr\Http\Message\ResponseInterface
     */
    public function listDevices(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListDevices(), $fetch);
    }
    /**
     *
     *
     * @param null|\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\CreateDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateDeviceForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device|\Psr\Http\Message\ResponseInterface
     */
    public function createDevice(?\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\CreateDevice($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListMyDevicesUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListMyDevicesForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device[]|\Psr\Http\Message\ResponseInterface
     */
    public function listMyDevices(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListMyDevices(), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceByIdNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteDeviceById(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\DeleteDeviceById($deviceId), $fetch);
    }
    /**
     * You will have to possibility to retrieve all if you're admin, only yours if not
     *
     * @param int $deviceId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceByIdNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device|\Psr\Http\Message\ResponseInterface
     */
    public function getDeviceById(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\GetDeviceById($deviceId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param null|\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceByIdNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device|\Psr\Http\Message\ResponseInterface
     */
    public function updateDeviceById(int $deviceId, ?\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\UpdateDeviceById($deviceId, $requestBody), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen[]|\Psr\Http\Message\ResponseInterface
     */
    public function listScreens(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListScreens($deviceId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function createScreen(int $deviceId, ?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\CreateScreen($deviceId, $requestBody), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensAsFramesUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensAsFramesForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ResponseFrameList|\Psr\Http\Message\ResponseInterface
     */
    public function listScreensAsFrames(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListScreensAsFrames($deviceId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param int $screenId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenByIdNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteScreenById(int $deviceId, int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\DeleteScreenById($deviceId, $screenId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param int $screenId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenByIdNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function getScreenById(int $deviceId, int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\GetScreenById($deviceId, $screenId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param int $screenId
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenByIdUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenByIdForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenByIdNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function updateScreenById(int $deviceId, int $screenId, ?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\UpdateScreenById($deviceId, $screenId, $requestBody), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://lametric.helpcomputer.org/v1');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \LGnap\OpenAPIClient\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
