<?php

namespace LGnap\OpenAPIClient;

class Client extends \LGnap\OpenAPIClient\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListUsersUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListUsersForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\User[]|\Psr\Http\Message\ResponseInterface
     */
    public function listUsers(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListUsers(), $fetch);
    }
    /**
     *
     *
     * @param null|\LGnap\OpenAPIClient\Model\UserUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ItemCreation|\Psr\Http\Message\ResponseInterface
     */
    public function createUser(?\LGnap\OpenAPIClient\Model\UserUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\CreateUser($requestBody), $fetch);
    }
    /**
     *
     *
     * @param int $userId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\DeleteUserUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteUserForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteUserNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteUser(int $userId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\DeleteUser($userId), $fetch);
    }
    /**
     *
     *
     * @param int $userId
     * @param null|\LGnap\OpenAPIClient\Model\UserUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\User|\Psr\Http\Message\ResponseInterface
     */
    public function updateUser(int $userId, ?\LGnap\OpenAPIClient\Model\UserUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\UpdateUser($userId, $requestBody), $fetch);
    }
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
     * @throws \LGnap\OpenAPIClient\Exception\CreateDeviceUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ItemCreation|\Psr\Http\Message\ResponseInterface
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
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteDevice(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\DeleteDevice($deviceId), $fetch);
    }
    /**
     * You will have to possibility to retrieve all if you're admin, only yours if not
     *
     * @param int $deviceId
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device|\Psr\Http\Message\ResponseInterface
     */
    public function getDevice(int $deviceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\GetDevice($deviceId), $fetch);
    }
    /**
     *
     *
     * @param int $deviceId
     * @param null|\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device|\Psr\Http\Message\ResponseInterface
     */
    public function updateDevice(int $deviceId, ?\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\UpdateDevice($deviceId, $requestBody), $fetch);
    }
    /**
     *
     *
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen[]|\Psr\Http\Message\ResponseInterface
     */
    public function listScreens(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListScreens($queryParameters), $fetch);
    }
    /**
     *
     *
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ItemCreation|\Psr\Http\Message\ResponseInterface
     */
    public function createScreen(?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\CreateScreen($requestBody, $queryParameters), $fetch);
    }
    /**
     *
     *
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensAsFramesUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListScreensAsFramesForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ResponseFrameList|\Psr\Http\Message\ResponseInterface
     */
    public function listScreensAsFrames(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\ListScreensAsFrames($queryParameters), $fetch);
    }
    /**
     *
     *
     * @param int $screenId
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteScreen(int $screenId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\DeleteScreen($screenId, $queryParameters), $fetch);
    }
    /**
     *
     *
     * @param int $screenId
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function getScreen(int $screenId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\GetScreen($screenId, $queryParameters), $fetch);
    }
    /**
     *
     *
     * @param int $screenId
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function updateScreen(int $screenId, ?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \LGnap\OpenAPIClient\Endpoint\UpdateScreen($screenId, $requestBody, $queryParameters), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://lametric.helpcomputer.org/v2');
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
