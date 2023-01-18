<?php

namespace Maksa988\MonobankAcquiring\Responses\Invoice;

use Maksa988\MonobankAcquiring\Models\Invoice\Create;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class CreateResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Create
     */
    public function toModel(array $response): Create
    {
        return Create::fromArray($response);
    }
}
