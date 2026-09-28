<?php

namespace LGnap\OpenAPIClient\Exception;

class CreateUserUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \LGnap\OpenAPIClient\Model\Error
     */
    private $error;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\LGnap\OpenAPIClient\Model\Error $error, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Unauthorized');
        $this->error = $error;
        $this->response = $response;
    }
    public function getError(): \LGnap\OpenAPIClient\Model\Error
    {
        return $this->error;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
