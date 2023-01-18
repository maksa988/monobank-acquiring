<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\Finalize;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class FinalizeResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Finalize
     */
    public function toModel(array $response): Finalize
    {
        return Finalize::fromArray($response);
    }
}
