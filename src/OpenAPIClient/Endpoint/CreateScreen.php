<?php

namespace LGnap\OpenAPIClient\Endpoint;

class CreateScreen extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    /**
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param array{
     *    "device_id": int,
     * } $queryParameters
     */
    public function __construct(?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, array $queryParameters = [])
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/screens';
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
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\CreateScreenUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ItemCreation
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\ItemCreation', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateScreenUnauthorizedException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateScreenForbiddenException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateScreenNotFoundException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateScreenUnprocessableEntityException($serializer->deserialize($body, 'LGnap\OpenAPIClient\Model\ErrorValidationItem[]', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['basicTokenAsUser'];
    }
}
