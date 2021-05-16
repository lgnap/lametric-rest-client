<?php

namespace LGnap\OpenAPIClient\Exception;

class UpdateUserNotFoundException extends NotFoundException
{
    private $error;
    public function __construct(\LGnap\OpenAPIClient\Model\Error $error)
    {
        parent::__construct('Forbidden', 404);
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
}
