<?php

namespace LGnap\Tests;

use Http\Discovery\Strategy\DiscoveryStrategy;
use Psr\Http\Client\ClientInterface;

/**
 * Fait renvoyer à Psr18ClientDiscovery le client simulé du test : le wrapper
 * découvre son client HTTP lui-même, sans point d'injection.
 */
final class MockClientStrategy implements DiscoveryStrategy
{
    /** @var ClientInterface|null */
    public static $client;

    public static function getCandidates($type)
    {
        if (ClientInterface::class !== $type || null === self::$client) {
            return [];
        }

        return [['class' => static function () {
            return self::$client;
        }, 'condition' => true]];
    }
}
