<?php

namespace Maksa988\MonobankAcquiring\Models;

class WalletItem implements ModelInterface
{
    const STATUS_CREATED = "created";
    const STATUS_ACTIVE = "active";

    /**
     * @var string
     */
    protected $extRef;

    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @var string
     */
    protected $maskedPan;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $cardHolder;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @param string      $extRef
     * @param string      $cardToken
     * @param string      $maskedPan
     * @param string      $status
     * @param string|null $cardHolder
     * @param string|null $country
     */
    public function __construct(
        string $extRef,
        string $cardToken,
        string $maskedPan,
        string $status,
        string $cardHolder = null,
        string $country = null
    ) {
        $this->extRef = $extRef;
        $this->cardToken = $cardToken;
        $this->maskedPan = $maskedPan;
        $this->status = $status;
        $this->cardHolder = $cardHolder;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getExtRef(): string
    {
        return $this->extRef;
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
    public function getMaskedPan(): string
    {
        return $this->maskedPan;
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
    public function getCardHolder(): ?string
    {
        return $this->cardHolder;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'extRef' => $this->getExtRef(),
            'cardToken' => $this->getCardToken(),
            'maskedPan' => $this->getMaskedPan(),
            'status' => $this->getStatus(),
            'cardHolder' => $this->getCardHolder(),
            'country' => $this->getCountry()
        ];
    }

    /**
     * @param array $data
     *
     * @return WalletItem
     */
    public static function fromArray(array $data): WalletItem
    {
        return new WalletItem(
            $data['extRef'],
            $data['cardToken'],
            $data['maskedPan'],
            $data['status'],
            $data['cardHolder'] ?? null,
            $data['country'] ?? null
        );
    }
}
