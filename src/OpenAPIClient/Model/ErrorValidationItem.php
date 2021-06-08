<?php

namespace LGnap\OpenAPIClient\Model;

class ErrorValidationItem
{
    /**
     *
     *
     * @var string
     */
    protected $field;
    /**
     *
     *
     * @var string
     */
    protected $message;
    /**
     *
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }
    /**
     *
     *
     * @param string $field
     *
     * @return self
     */
    public function setField(string $field): self
    {
        $this->field = $field;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     *
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
