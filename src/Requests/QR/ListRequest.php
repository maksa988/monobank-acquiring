<?php

namespace Maksa988\MonobankAcquiring\Requests\QR;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\QR\ListResponse;

class ListRequest implements RequestInterface
{
    /**
     * @return array<string, int|null>
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/qr/list";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return ListResponse
     */
    public function response(): ListResponse
    {
        return new ListResponse();
    }
}
