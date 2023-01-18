<?php

namespace Maksa988\MonobankAcquiring\Requests;

use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

interface RequestInterface
{
    /** @return string */
    public function url(): string;

    /** @return string */
    public function httpMethod(): string;

    /** @return array */
    public function toArray(): array;

    /** @return ResponseInterface */
    public function response(): ResponseInterface;
}
