<?php

namespace LGnap\OpenAPIClient\Endpoint;

class GetScreen extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $screen_id;
    /**
     *
     *
     * @param int $screenId
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     */
    public function __construct(int $screenId, array $queryParameters = array())
    {
        $this->screen_id = $screenId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{screen_id}'), array($this->screen_id), '/screens/{screen_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('device_id'));
        $optionsResolver->setRequired(array('device_id'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('device_id', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\GetScreenNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Screen', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetScreenUnauthorizedException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetScreenForbiddenException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\GetScreenNotFoundException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basic');
    }
}
