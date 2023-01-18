<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\Cancel;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class CancelResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Cancel
     */
    public function toModel(array $response): Cancel
    {
        return Cancel::fromArray($response);
    }
}
