<?php

namespace LGnap\OpenAPIClient\Exception;

class DeleteUserNotFoundException extends NotFoundException
{
    private $error;
    public function __construct(\LGnap\OpenAPIClient\Model\Error $error)
    {
        parent::__construct('Not found', 404);
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
}
