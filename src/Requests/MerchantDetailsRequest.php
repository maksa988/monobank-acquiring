<?php

namespace Maksa988\MonobankAcquiring\Requests;

use Maksa988\MonobankAcquiring\Responses\MerchantDetailsResponse;

class MerchantDetailsRequest implements RequestInterface
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
        return "/api/merchant/details";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return MerchantDetailsResponse
     */
    public function response(): MerchantDetailsResponse
    {
        return new MerchantDetailsResponse();
    }
}
