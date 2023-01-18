<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\DeleteCardResponse;

class DeleteCardRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $cardToken;

    /**
     * @param string $cardToken
     */
    public function __construct(string $cardToken)
    {
        $this->cardToken = $cardToken;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "cardToken" => $this->cardToken,
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
        return "DELETE";
    }

    /**
     * @return DeleteCardResponse
     */
    public function response(): DeleteCardResponse
    {
        return new DeleteCardResponse();
    }
}
