<?php

namespace Maksa988\MonobankAcquiring\Responses;

use Maksa988\MonobankAcquiring\Models\MerchantDetails;

class MerchantDetailsResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return MerchantDetails
     */
    public function toModel(array $response): MerchantDetails
    {
        return MerchantDetails::fromArray($response);
    }
}
