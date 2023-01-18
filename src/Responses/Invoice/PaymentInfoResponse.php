<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\PaymentInfo;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class PaymentInfoResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return PaymentInfo
     */
    public function toModel(array $response): PaymentInfo
    {
        return PaymentInfo::fromArray($response);
    }
}
