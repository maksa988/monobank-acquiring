<?php

namespace Maksa988\MonobankAcquiring\Requests;

use Maksa988\MonobankAcquiring\Responses\PubKeyResponse;

class PubKeyRequest implements RequestInterface
{
    /**
     * @return array<string, int|null>
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/pubkey";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return PubKeyResponse
     */
    public function response(): PubKeyResponse
    {
        return new PubKeyResponse();
    }
}
