<?php

namespace LGnap\OpenAPIClient\Exception;

class CreateUserForbiddenException extends ForbiddenException
{
    private $error;
    public function __construct(\LGnap\OpenAPIClient\Model\Error $error)
    {
        parent::__construct('Forbidden', 403);
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
}
