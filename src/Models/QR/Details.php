<?php

namespace Maksa988\MonobankAcquiring\Models\QR;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

class Details implements ModelInterface
{
    /**
     * @var string
     */
    protected $shortQrId;

    /**
     * @var string|null
     */
    protected $invoiceId;

    /**
     * @var int|null
     */
    protected $amount;

    /**
     * @var int|null
     */
    protected $ccy;

    /**
     * @param string      $shortQrId
     * @param string|null $invoiceId
     * @param int|null    $amount
     * @param int|null    $ccy
     */
    public function __construct(string $shortQrId, ?string $invoiceId = null, ?int $amount = null, ?int $ccy = null)
    {
        $this->shortQrId = $shortQrId;
        $this->invoiceId = $invoiceId;
        $this->amount = $amount;
        $this->ccy = $ccy;
    }

    /**
     * @return string
     */
    public function getShortQrId(): string
    {
        return $this->shortQrId;
    }

    /**
     * @return string|null
     */
    public function getInvoiceId(): ?string
    {
        return $this->invoiceId;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @return int|null
     */
    public function getCcy(): ?int
    {
        return $this->ccy;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "shortQrId" => $this->getShortQrId(),

            "invoiceId" => $this->getInvoiceId(),
            "amount" => $this->getAmount(),
            "getCcy" => $this->getCcy(),
        ];
    }

    /**
     * @param array $data
     *
     * @return Details
     */
    public static function fromArray(array $data): Details
    {
        return new self(
            $data['shortQrId'],

            $data['invoiceId'] ?? null,
            $data['amount'] ?? null,
            $data['ccy'] ?? null,
        );
    }
}
