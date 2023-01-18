<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Models\CardItem;
use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\AddResponse;

class AddRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $extRef;

    /**
     * @var CardItem
     */
    public $card;

    /**
     * @var string|null
     */
    public $walletId;

    /**
     * @var string|null
     */
    public $gToken;

    /**
     * @var string|null
     */
    public $aToken;

    /**
     * @var string|null
     */
    public $webHookUrl;

    /**
     * @param string      $extRef
     * @param CardItem    $card
     * @param string|null $webHookUrl
     * @param string|null $walletId
     * @param string|null $gToken
     * @param string|null $aToken
     */
    public function __construct(
        string $extRef,
        CardItem $card,
        string $webHookUrl = null,
        string $walletId = null,
        string $gToken = null,
        string $aToken = null
    ) {
        $this->extRef = $extRef;
        $this->card = $card;
        $this->webHookUrl = $webHookUrl;
        $this->walletId = $walletId;
        $this->gToken = $gToken;
        $this->aToken = $aToken;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "extRef" => $this->extRef,
            "card" => $this->card->toArray(),
            "webHookUrl" => $this->webHookUrl,
            "walletId" => $this->walletId,
            "gToken" => $this->gToken,
            "aToken" => $this->aToken,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/wallet/add";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return AddResponse
     */
    public function response(): AddResponse
    {
        return new AddResponse();
    }
}
