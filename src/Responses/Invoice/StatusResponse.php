<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\Status;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class StatusResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Status
     */
    public function toModel(array $response): Status
    {
        return Status::fromArray($response);
    }
}
