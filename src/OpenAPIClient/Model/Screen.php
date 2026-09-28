<?php

namespace LGnap\OpenAPIClient\Model;

use LGnap\OpenAPIClient\Runtime\AdditionalAndPatternProperties;
use LGnap\OpenAPIClient\Runtime\AdditionalPropertiesInterface;

class Screen implements AdditionalPropertiesInterface
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
    protected $icon;
    /**
     * @var string
     */
    protected $text;
    /**
     * @var int
     */
    protected $id;
    /**
     * @return int
     */
    public function getIcon(): int
    {
        return $this->icon;
    }
    /**
     * @param int $icon
     *
     * @return self
     */
    public function setIcon(int $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;
        return $this;
    }
    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    /**
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    public function definedProperties(): array
    {
        return ['icon' => ['icon', 'getIcon', 'setIcon'], 'text' => ['text', 'getText', 'setText'], 'id' => ['id', 'getId', 'setId']];
    }
}
