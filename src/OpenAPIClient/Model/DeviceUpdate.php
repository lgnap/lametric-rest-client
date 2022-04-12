<?php

namespace LGnap\OpenAPIClient\Model;

class DeviceUpdate
{
    /**
     *
     *
     * @var string|null
     */
    protected $name;
    /**
     *
     *
     * @var int|null
     */
    protected $userId;
    /**
     *
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     *
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
    /**
     *
     *
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }
    /**
     *
     *
     * @param int|null $userId
     *
     * @return self
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
}
