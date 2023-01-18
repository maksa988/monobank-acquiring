<?php

namespace Maksa988\MonobankAcquiring\Responses\Wallet;

use Maksa988\MonobankAcquiring\Models\Wallet\Wallet;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class WalletResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Wallet
     */
    public function toModel(array $response): Wallet
    {
        return Wallet::fromArray($response);
    }
}
