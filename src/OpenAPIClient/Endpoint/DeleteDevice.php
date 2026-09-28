<?php

namespace LGnap\OpenAPIClient\Endpoint;

class DeleteDevice extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $device_id;
    /**
     * @param int $deviceId
     */
    public function __construct(int $deviceId)
    {
        $this->device_id = $deviceId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
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
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteDeviceNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\DeleteDeviceUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\DeleteDeviceForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\DeleteDeviceNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
