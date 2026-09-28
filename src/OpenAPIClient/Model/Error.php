<?php

namespace LGnap\OpenAPIClient\Model;

use LGnap\OpenAPIClient\Runtime\AdditionalAndPatternProperties;
use LGnap\OpenAPIClient\Runtime\AdditionalPropertiesInterface;

class Error implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var int
     */
    protected $status;
    /**
     * @var int
     */
    protected $code;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $type;
    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
    /**
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }
    /**
     * @param int $code
     *
     * @return self
     */
    public function setCode(int $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    public function definedProperties(): array
    {
        return ['status' => ['status', 'getStatus', 'setStatus'], 'code' => ['code', 'getCode', 'setCode'], 'message' => ['message', 'getMessage', 'setMessage'], 'name' => ['name', 'getName', 'setName'], 'type' => ['type', 'getType', 'setType']];
    }
}
