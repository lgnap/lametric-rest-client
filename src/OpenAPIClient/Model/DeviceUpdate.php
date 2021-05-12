<?php

namespace LGnap\OpenAPIClient\Model;

class DeviceUpdate
{
    /**
     *
     *
     * @var string
     */
    protected $userId;
    /**
     *
     *
     * @var string
     */
    protected $name;
    /**
     *
     *
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
    /**
     *
     *
     * @param string $userId
     *
     * @return self
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;
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
}
