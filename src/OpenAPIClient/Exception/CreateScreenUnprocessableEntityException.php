<?php

namespace LGnap\OpenAPIClient\Exception;

class CreateScreenUnprocessableEntityException extends UnprocessableEntityException
{
    private $errorValidationItemList;
    public function __construct($errorValidationItemList)
    {
        parent::__construct('Validation issue', 422);
        $this->errorValidationItemList = $errorValidationItemList;
    }
    public function getErrorValidationItemList()
    {
        return $this->errorValidationItemList;
    }
}
