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
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\UriInterface;

class ClientWrapper extends Client
{
    public const URL_PROD = 'https://lametric.helpcomputer.org/';
    public const URL_DEV = 'http://localhost:8000/';

    public static function createProdClient(string $accessToken, string $version = 'v2', ?ClientInterface $httpClient = null): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_PROD . $version);

        return self::createCommonClient($uri, new BasicAuth($accessToken, ''), $httpClient);
    }

    public static function createDevClient(string $accessToken, string $version = 'v2', ?ClientInterface $httpClient = null): ClientWrapper
    {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri(self::URL_DEV . $version);

        return self::createCommonClient($uri, new BasicAuth($accessToken, ''), $httpClient);
    }

    /**
     * @param ClientInterface|null $httpClient client PSR-18 sous-jacent ; découvert automatiquement si absent
     */
    public static function createCommonClient(UriInterface $uri, BasicAuth $basicAuth, ?ClientInterface $httpClient = null): ClientWrapper
    {
        $httpClient = new PluginClient($httpClient ?? Psr18ClientDiscovery::find(), [
            new AddHostPlugin($uri),
            new AddPathPlugin($uri),
            new AuthenticationPlugin($basicAuth)
        ]);

        // Hôte, chemin et authentification sont déjà posés ci-dessus : on
        // n'applique pas les plugins « serveur » du client généré (URL de prod
        // en dur), sinon le chemin /v2 serait ajouté deux fois.
        return self::create($httpClient, [], [], false);
    }
}
