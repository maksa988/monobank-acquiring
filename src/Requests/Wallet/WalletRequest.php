<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\WalletResponse;

class WalletRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $walletId;

    /**
     * @param string $walletId
     */
    public function __construct(string $walletId)
    {
        $this->walletId = $walletId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "walletId" => $this->walletId,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/wallet";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return WalletResponse
     */
    public function response(): WalletResponse
    {
        return new WalletResponse();
    }
}
