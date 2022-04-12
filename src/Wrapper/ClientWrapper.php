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
    public const URL_PROD = 'https://lametric.helpcomputer.org/';
    public const URL_DEV = 'http://localhost:8000/';

    public static function createProdClient(string $accessToken, string $version = 'v2'): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_PROD . $version);

        return self::createCommonClient($uri, new BasicAuth($accessToken, ''));
    }

    public static function createDevClient(string $accessToken, string $version = 'v2'): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_DEV . $version);

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
