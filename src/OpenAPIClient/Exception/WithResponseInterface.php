<?php

namespace LGnap\OpenAPIClient\Exception;

interface WithResponseInterface
{
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface;
}
