<?php

namespace LGnap\OpenAPIClient\Endpoint;

class CreateUser extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    /**
     *
     *
     * @param null|\LGnap\OpenAPIClient\Model\UserUpdate $requestBody
     */
    public function __construct(?\LGnap\OpenAPIClient\Model\UserUpdate $requestBody = null)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/users';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \LGnap\OpenAPIClient\Model\UserUpdate) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\CreateUserUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\ItemCreation
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\ItemCreation', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateUserUnauthorizedException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateUserForbiddenException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\CreateUserUnprocessableEntityException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\ErrorValidationItem[]', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basic');
    }
}
