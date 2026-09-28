<?php

namespace LGnap\OpenAPIClient\Model;

use LGnap\OpenAPIClient\Runtime\AdditionalAndPatternProperties;
use LGnap\OpenAPIClient\Runtime\AdditionalPropertiesInterface;

class ResponseFrameList implements AdditionalPropertiesInterface
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
     * @var list<Screen>
     */
    protected $frames;
    /**
     * @return list<Screen>
     */
    public function getFrames(): array
    {
        return $this->frames;
    }
    /**
     * @param list<Screen> $frames
     *
     * @return self
     */
    public function setFrames(array $frames): self
    {
        $this->initialized['frames'] = true;
        $this->frames = $frames;
        return $this;
    }
    public function definedProperties(): array
    {
        return ['frames' => ['frames', 'getFrames', 'setFrames']];
    }
}
