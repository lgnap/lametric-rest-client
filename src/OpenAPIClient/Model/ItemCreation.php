<?php

namespace LGnap\OpenAPIClient\Model;

class ItemCreation
{
    /**
     *
     *
     * @var int
     */
    protected $id;
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
