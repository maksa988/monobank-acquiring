<?php

namespace Maksa988\MonobankAcquiring\Responses\Wallet;

use Maksa988\MonobankAcquiring\Models\Wallet\Card;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class CardResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Card
     */
    public function toModel(array $response): Card
    {
        return Card::fromArray($response);
    }
}
