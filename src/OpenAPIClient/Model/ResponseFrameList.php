<?php

namespace LGnap\OpenAPIClient\Model;

class ResponseFrameList
{
    /**
     *
     *
     * @var Screen[]
     */
    protected $frames;
    /**
     *
     *
     * @return Screen[]
     */
    public function getFrames(): array
    {
        return $this->frames;
    }
    /**
     *
     *
     * @param Screen[] $frames
     *
     * @return self
     */
    public function setFrames(array $frames): self
    {
        $this->frames = $frames;
        return $this;
    }
}
