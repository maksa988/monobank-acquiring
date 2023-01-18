<?php

namespace Maksa988\MonobankAcquiring\Models;

use Maksa988\MonobankAcquiring\MonobankAcquiring;

class CancelListItem implements ModelInterface
{
    const STATUS_PROCESSING = "processing";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $modifiedDate;

    /**
     * @var int|null
     */
    protected $amount;

    /**
     * @var int|null
     */
    protected $ccy;

    /**
     * @var string
     */
    protected $approvalCode;

    /**
     * @var string|null
     */
    protected $rrn;

    /**
     * @var string|null
     */
    protected $extRef;

    /**
     * @param string      $status
     * @param string      $createdDate
     * @param string      $modifiedDate
     * @param string|null $amount
     * @param string|null $ccy
     * @param string|null $approvalCode
     * @param string|null $rrn
     * @param string|null $extRef
     */
    public function __construct(
        string $status,
        string $createdDate,
        string $modifiedDate,
        string $amount = null,
        string $ccy = null,
        string $approvalCode = null,
        string $rrn = null,
        string $extRef = null
    ) {
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;

        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->extRef = $extRef;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return \DateTime|false
     */
    public function getCreatedDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getCreatedDateRaw());
    }

    /**
     * @return \DateTime|false
     */
    public function getCreatedDateRaw(): string
    {
        return $this->createdDate;
    }

    /**
     * @return \DateTime|false
     */
    public function getModifiedDate(): string
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getModifiedDateRaw());
    }

    /**
     * @return string
     */
    public function getModifiedDateRaw(): string
    {
        return $this->modifiedDate;
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
     * @return string|null
     */
    public function getExtRef(): ?string
    {
        return $this->extRef;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "status" => $this->getStatus(),
            "createdDate" => $this->getCreatedDateRaw(),
            "modifiedDate" => $this->getModifiedDateRaw(),

            "amount" => $this->getAmount(),
            "ccy" => $this->getCcy(),
            "approvalCode" => $this->getApprovalCode(),
            "rrn" => $this->getRrn(),
            "extRef" => $this->getExtRef()
        ];
    }

    /**
     * @param array $data
     *
     * @return CancelListItem
     */
    public static function fromArray(array $data): CancelListItem
    {
        return new self(
            $data["status"],
            $data["createdDate"],
            $data["modifiedDate"],

            $data["amount"] ?? null,
            $data["ccy"] ?? null,
            $data["approvalCode"] ?? null,
            $data["rrn"] ?? null,
            $data["extRef"] ?? null
        );
    }
}
