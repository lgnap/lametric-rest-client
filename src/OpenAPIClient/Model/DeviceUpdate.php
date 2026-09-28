<?php

namespace LGnap\OpenAPIClient\Model;

use LGnap\OpenAPIClient\Runtime\AdditionalAndPatternProperties;
use LGnap\OpenAPIClient\Runtime\AdditionalPropertiesInterface;

class DeviceUpdate implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $name;
    /**
     * @var int|null
     */
    protected $userId;
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }
    /**
     * @param int|null $userId
     *
     * @return self
     */
    public function setUserId(?int $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
        return $this;
    }
    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'userId' => ['user_id', 'getUserId', 'setUserId']];
    }
}
