<?php

namespace Maksa988\MonobankAcquiring\Models\Wallet;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

class Add implements ModelInterface
{
    const STATUS_CREATED = "created";
    const STATUS_ACTIVE = "active";

    /**
     * @var string
     */
    protected $walletId;

    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $tdsUrl;

    /**
     * @param string      $walletId
     * @param string      $cardToken
     * @param string      $status
     * @param string|null $tdsUrl
     */
    public function __construct(string $walletId, string $cardToken, string $status, string $tdsUrl = null)
    {
        $this->walletId = $walletId;
        $this->cardToken = $cardToken;
        $this->status = $status;
        $this->tdsUrl = $tdsUrl;
    }

    /**
     * @return string
     */
    public function getWalletId(): string
    {
        return $this->walletId;
    }

    /**
     * @return string
     */
    public function getCardToken(): string
    {
        return $this->cardToken;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getTdsUrl(): ?string
    {
        return $this->tdsUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "walletId" => $this->getWalletId(),
            "cardToken" => $this->getCardToken(),
            "status" => $this->getStatus(),
            "tdsUrl" => $this->getTdsUrl()
        ];
    }

    /**
     * @param array $data
     *
     * @return Add
     */
    public static function fromArray(array $data): Add
    {
        return new Add(
            $data['walletId'],
            $data['cardToken'],
            $data['status'],
            $data['tdsUrl'] ?? null
        );
    }
}
