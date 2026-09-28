<?php

namespace LGnap\OpenAPIClient\Endpoint;

class UpdateDevice extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $device_id;
    /**
     * @param int $deviceId
     * @param null|\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody
     */
    public function __construct(int $deviceId, ?\LGnap\OpenAPIClient\Model\DeviceUpdate $requestBody = null)
    {
        $this->device_id = $deviceId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(['{device_id}'], [rawurlencode($this->device_id)], '/devices/{device_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \LGnap\OpenAPIClient\Model\DeviceUpdate) {
            return [['Content-Type' => ['application/json']], \LGnap\OpenAPIClient\Runtime\Client\JsonPayload::encode($serializer, $this->body)];
        }
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateDeviceUnprocessableEntityException
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
            throw new \LGnap\OpenAPIClient\Exception\UpdateDeviceUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateDeviceForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateDeviceNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateDeviceUnprocessableEntityException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\ErrorValidationItem[]', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
