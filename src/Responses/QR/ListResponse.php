<?php

namespace Maksa988\MonobankAcquiring\Responses\QR;

use Maksa988\MonobankAcquiring\Models\QR\QRList;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class ListResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return QRList
     */
    public function toModel(array $response): QRList
    {
        return QRList::fromArray($response);
    }
}
