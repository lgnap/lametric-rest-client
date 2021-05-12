<?php

namespace LGnap\OpenAPIClient\Model;

class Screen
{
    /**
     *
     *
     * @var int
     */
    protected $icon;
    /**
     *
     *
     * @var string
     */
    protected $text;
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
    public function getIcon(): int
    {
        return $this->icon;
    }
    /**
     *
     *
     * @param int $icon
     *
     * @return self
     */
    public function setIcon(int $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    /**
     *
     *
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
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
