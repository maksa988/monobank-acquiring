<?php

namespace Maksa988\MonobankAcquiring\Responses\QR;

use Maksa988\MonobankAcquiring\Models\QR\Details;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class DetailsResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Details
     */
    public function toModel(array $response): Details
    {
        return Details::fromArray($response);
    }
}
