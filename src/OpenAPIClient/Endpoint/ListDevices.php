<?php

namespace LGnap\OpenAPIClient\Endpoint;

class ListDevices extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/devices';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\ListDevicesUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\ListDevicesForbiddenException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Device[]
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Device[]', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\ListDevicesUnauthorizedException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\ListDevicesForbiddenException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basic');
    }
}
