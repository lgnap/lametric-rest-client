<?php

namespace LGnap\OpenAPIClient\Model;

class Error
{
    /**
     *
     *
     * @var int
     */
    protected $status;
    /**
     *
     *
     * @var int
     */
    protected $code;
    /**
     *
     *
     * @var string
     */
    protected $message;
    /**
     *
     *
     * @var string
     */
    protected $name;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     *
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
    /**
     *
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }
    /**
     *
     *
     * @param int $code
     *
     * @return self
     */
    public function setCode(int $code): self
    {
        $this->code = $code;
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
    /**
     *
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     *
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
