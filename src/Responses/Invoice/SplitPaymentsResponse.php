<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\SplitPayment;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class SplitPaymentsResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return SplitPayment
     */
    public function toModel(array $response): SplitPayment
    {
        return SplitPayment::fromArray($response);
    }
}
