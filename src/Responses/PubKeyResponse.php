<?php

namespace Maksa988\MonobankAcquiring\Responses;

use Maksa988\MonobankAcquiring\Models\PubKey;

class PubKeyResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return PubKey
     */
    public function toModel(array $response): PubKey
    {
        return PubKey::fromArray($response);
    }
}
