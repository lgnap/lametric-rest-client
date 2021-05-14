<?php

namespace LGnap\OpenAPIClient\Model;

class DeviceUpdate
{
    /**
     *
     *
     * @var string
     */
    protected $name;
    /**
     *
     *
     * @var int
     */
    protected $userId;
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
    /**
     *
     *
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
}
