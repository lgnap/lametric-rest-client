<?php

namespace LGnap\OpenAPIClient\Exception;

class UpdateScreenUnprocessableEntityException extends UnprocessableEntityException
{
    /**
     * @var \LGnap\OpenAPIClient\Model\ErrorValidationItem[][]
     */
    private $errorValidationItemList;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct($errorValidationItemList, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Validation issue');
        $this->errorValidationItemList = $errorValidationItemList;
        $this->response = $response;
    }
    public function getErrorValidationItemList()
    {
        return $this->errorValidationItemList;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
