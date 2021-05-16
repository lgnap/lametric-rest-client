<?php

namespace LGnap\OpenAPIClient\Exception;

class UpdateScreenUnauthorizedException extends UnauthorizedException
{
    private $error;
    public function __construct(\LGnap\OpenAPIClient\Model\Error $error)
    {
        parent::__construct('Unauthorized', 401);
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
}
