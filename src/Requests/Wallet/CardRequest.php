<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\CardResponse;

class CardRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $extRef;

    /**
     * @param string $extRef
     */
    public function __construct(string $extRef)
    {
        $this->extRef = $extRef;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "extRef" => $this->extRef,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/wallet/card";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return CardResponse
     */
    public function response(): CardResponse
    {
        return new CardResponse();
    }
}
