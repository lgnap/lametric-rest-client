<?php

namespace LGnap\OpenAPIClient\Model;

class Device
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
     * @var int
     */
    protected $id;
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
    /**
     *
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     *
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}
