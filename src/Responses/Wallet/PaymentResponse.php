<?php

namespace Maksa988\MonobankAcquiring\Responses\Wallet;

use Maksa988\MonobankAcquiring\Models\Wallet\Payment;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class PaymentResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Payment
     */
    public function toModel(array $response): Payment
    {
        return Payment::fromArray($response);
    }
}
