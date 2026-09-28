<?php

namespace LGnap\OpenAPIClient\Endpoint;

class DeleteScreen extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $screen_id;
    /**
     * @param int $screenId
     * @param array{
     *    "device_id": int,
     * } $queryParameters
     */
    public function __construct(int $screenId, array $queryParameters = [])
    {
        $this->screen_id = $screenId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(['{screen_id}'], [rawurlencode($this->screen_id)], '/screens/{screen_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['device_id']);
        $optionsResolver->setRequired(['device_id']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('device_id', ['int']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\DeleteScreenNotFoundException
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
            throw new \LGnap\OpenAPIClient\Exception\DeleteScreenUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\DeleteScreenForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\DeleteScreenNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
