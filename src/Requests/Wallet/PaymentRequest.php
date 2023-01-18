<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\PaymentResponse;

class PaymentRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $cardToken;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var int
     */
    public $ccy;

    /**
     * @var bool
     */
    public $tds = true;

    /**
     * @var string
     */
    public $redirectUrl;

    /**
     * @var string|null
     */
    public $webHookUrl;

    /**
     * @param string      $cardToken
     * @param int         $amount
     * @param string      $redirectUrl
     * @param int         $ccy
     * @param bool        $tds
     * @param string|null $webHookUrl
     */
    public function __construct(
        string $cardToken,
        int $amount,
        string $redirectUrl,
        int $ccy = 980,
        bool $tds = true,
        string $webHookUrl = null
    ) {
        $this->cardToken = $cardToken;
        $this->amount = $amount;
        $this->redirectUrl = $redirectUrl;
        $this->ccy = $ccy;
        $this->tds = $tds;
        $this->webHookUrl = $webHookUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "cardToken" => $this->cardToken,
            "amount" => $this->amount,
            "ccy" => $this->ccy,
            "tds" => $this->tds,
            "redirectUrl" => $this->redirectUrl,
            "webHookUrl" => $this->webHookUrl,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/wallet/payment";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return PaymentResponse
     */
    public function response(): PaymentResponse
    {
        return new PaymentResponse();
    }
}
