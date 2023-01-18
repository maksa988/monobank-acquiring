<?php

namespace Maksa988\MonobankAcquiring\Models;

use Maksa988\MonobankAcquiring\MonobankAcquiring;

class StatementCancelListItem implements ModelInterface
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $ccy;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $maskedPan;

    /**
     * @var string|null
     */
    protected $approvalCode;

    /**
     * @var string|null
     */
    protected $rrn;

    /**
     * @param int         $amount
     * @param int         $ccy
     * @param string      $date
     * @param string      $maskedPan
     * @param string|null $approvalCode
     * @param string|null $rrn
     */
    public function __construct(
        int $amount,
        int $ccy,
        string $date,
        string $maskedPan,
        ?string $approvalCode = null,
        ?string $rrn = null
    ) {
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->date = $date;
        $this->maskedPan = $maskedPan;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getCcy(): int
    {
        return $this->ccy;
    }

    /**
     * @return string
     */
    public function getDateRaw(): string
    {
        return $this->date;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getDateRaw());
    }

    /**
     * @return string
     */
    public function getMaskedPan(): string
    {
        return $this->maskedPan;
    }

    /**
     * @return string|null
     */
    public function getApprovalCode(): ?string
    {
        return $this->approvalCode;
    }

    /**
     * @return string|null
     */
    public function getRrn(): ?string
    {
        return $this->rrn;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'amount' => $this->getAmount(),
            'ccy' => $this->getCcy(),
            'date' => $this->getDateRaw(),
            'maskedPan' => $this->getMaskedPan(),
            'approvalCode' => $this->getApprovalCode(),
            'rrn' => $this->getRrn()
        ];
    }

    /**
     * @param array $data
     *
     * @return StatementCancelListItem
     */
    public static function fromArray(array $data): StatementCancelListItem
    {
        return new self(
            $data["amount"],
            $data["ccy"],
            $data["date"],
            $data["maskedPan"],

            $data["approvalCode"] ?? null,
            $data["rrn"] ?? null,
        );
    }
}
