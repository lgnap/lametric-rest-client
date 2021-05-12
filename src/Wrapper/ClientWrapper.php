<?php

namespace LGnap\Wrapper;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication\BasicAuth;
use LGnap\OpenAPIClient\Client;
use Psr\Http\Message\UriInterface;

class ClientWrapper extends Client
{
    public const URL_PROD = 'https://lametric.helpcomputer.org/v1';
    public const URL_DEV = 'http://localhost:8000/v1';

    public static function createProdClient(string $accessToken): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_PROD);

        return self::createCommonClient($uri, new BasicAuth($accessToken, ''));
    }

    public static function createDevClient(string $accessToken): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_DEV);

        return self::createCommonClient($uri, new BasicAuth($accessToken, ''));
    }

    public static function createCommonClient(UriInterface $uri, BasicAuth $basicAuth): ClientWrapper
    {
        $httpClient = new PluginClient(Psr18ClientDiscovery::find(), [
            new AddHostPlugin($uri),
            new AddPathPlugin($uri),
            new AuthenticationPlugin($basicAuth)
        ]);

        return self::create($httpClient);
    }
}
