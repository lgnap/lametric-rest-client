<?php

namespace LGnap\OpenAPIClient\Endpoint;

class UpdateScreen extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $screen_id;
    /**
     * @param int $screenId
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param array{
     *    "device_id": int,
     * } $queryParameters
     */
    public function __construct(int $screenId, ?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, array $queryParameters = [])
    {
        $this->screen_id = $screenId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(['{screen_id}'], [rawurlencode($this->screen_id)], '/screens/{screen_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \LGnap\OpenAPIClient\Model\ScreenUpdate) {
            return [['Content-Type' => ['application/json']], \LGnap\OpenAPIClient\Runtime\Client\JsonPayload::encode($serializer, $this->body)];
        }
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
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Screen', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenUnprocessableEntityException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\ErrorValidationItem[]', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
