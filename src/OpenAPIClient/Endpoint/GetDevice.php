<?php

namespace LGnap\OpenAPIClient\Endpoint;

class GetDevice extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $device_id;
    /**
     * You will have to possibility to retrieve all if you're admin, only yours if not
     * @param int $deviceId
     */
    public function __construct(int $deviceId)
    {
        $this->device_id = $deviceId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(['{device_id}'], [rawurlencode($this->device_id)], '/devices/{device_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetDeviceNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Device', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetDeviceUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetDeviceForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetDeviceNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
