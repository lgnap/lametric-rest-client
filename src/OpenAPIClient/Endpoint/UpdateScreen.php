<?php

namespace LGnap\OpenAPIClient\Endpoint;

class UpdateScreen extends \LGnap\OpenAPIClient\Runtime\Client\BaseEndpoint implements \LGnap\OpenAPIClient\Runtime\Client\Endpoint
{
    use \LGnap\OpenAPIClient\Runtime\Client\EndpointTrait;
    protected $screen_id;
    /**
     *
     *
     * @param int $screenId
     * @param null|\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody
     * @param array $queryParameters {
     *     @var int $device_id
     * }
     */
    public function __construct(int $screenId, ?\LGnap\OpenAPIClient\Model\ScreenUpdate $requestBody = null, array $queryParameters = array())
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
        return str_replace(array('{screen_id}'), array($this->screen_id), '/screens/{screen_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \LGnap\OpenAPIClient\Model\ScreenUpdate) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
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
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenUnauthorizedException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenForbiddenException
     * @throws \LGnap\OpenAPIClient\Exception\UpdateScreenNotFoundException
     *
     * @return null|\LGnap\OpenAPIClient\Model\Screen
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Screen', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenUnauthorizedException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenForbiddenException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \LGnap\OpenAPIClient\Exception\UpdateScreenNotFoundException($serializer->deserialize($body, 'LGnap\\OpenAPIClient\\Model\\Error', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basic');
    }
}
