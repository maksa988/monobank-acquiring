<?php

namespace Maksa988\MonobankAcquiring\Responses\Wallet;

use Maksa988\MonobankAcquiring\Models\Wallet\Add;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class AddResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Add
     */
    public function toModel(array $response): Add
    {
        return Add::fromArray($response);
    }
}
