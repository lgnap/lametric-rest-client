<?php

namespace LGnap\OpenAPIClient\Endpoint;

class UpdateUser extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $user_id;
    /**
     *
     *
     * @param int $userId
     * @param null|\LGnap\OpenAPIClient\Model\UserUpdate $requestBody
     */
    public function __construct(int $userId, ?\LGnap\OpenAPIClient\Model\UserUpdate $requestBody = null)
    {
        $this->user_id = $userId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{user_id}'), array($this->user_id), '/users/{user_id}');
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
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserNotFoundException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateUserUnprocessableEntityException
     *
     * @return null|\LGnap\OpenAPIClient\Model\User
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\User', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateUserUnauthorizedException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateUserForbiddenException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateUserNotFoundException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateUserUnprocessableEntityException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\ErrorValidationItem[]', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basic');
    }
}
