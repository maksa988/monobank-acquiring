<?php

namespace Maksa988\MonobankAcquiring\Responses\QR;

use Maksa988\MonobankAcquiring\Models\NoContent;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class ResetAmountResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return NoContent
     */
    public function toModel(array $response): NoContent
    {
        return NoContent::fromArray($response);
    }
}
