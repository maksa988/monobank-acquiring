<?php

namespace Maksa988\MonobankAcquiring\Models;

class QRListItem implements ModelInterface
{
    const AMOUNT_TYPE_MERCHANT = "merchant";
    const AMOUNT_TYPE_CLIENT = "client";
    const AMOUNT_TYPE_FIX = "fix";

    /**
     * @var string
     */
    protected $shortQrId;

    /**
     * @var string
     */
    protected $qrId;

    /**
     * @var string
     */
    protected $amountType;

    /**
     * @var
     */
    protected $pageUrl;

    /**
     * @param string $shortQrId
     * @param string $qrId
     * @param string $amountType
     * @param string $pageUrl
     */
    public function __construct(string $shortQrId, string $qrId, string $amountType, string $pageUrl)
    {
        $this->shortQrId = $shortQrId;
        $this->qrId = $qrId;
        $this->amountType = $amountType;
        $this->pageUrl = $pageUrl;
    }

    /**
     * @return string
     */
    public function getShortQrId(): string
    {
        return $this->shortQrId;
    }

    /**
     * @return string
     */
    public function getQrId(): string
    {
        return $this->qrId;
    }

    /**
     * @return string
     */
    public function getAmountType(): string
    {
        return $this->amountType;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "shortQrId" => $this->getShortQrId(),
            "qrId" => $this->getQrId(),
            "amountType" => $this->getAmountType(),
            "pageUrl" => $this->getPageUrl()
        ];
    }

    /**
     * @param array $data
     *
     * @return QRListItem
     */
    public static function fromArray(array $data): QRListItem
    {
        return new self(
            $data["shortQrId"],
            $data["qrId"],
            $data["amountType"],
            $data["pageUrl"],
        );
    }
}
