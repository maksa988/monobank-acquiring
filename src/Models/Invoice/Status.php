<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\CancelListItem;
use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Models\SplitListItem;
use Maksa988\MonobankAcquiring\MonobankAcquiring;

class Status implements ModelInterface
{
    const STATUS_CREATED = "created";
    const STATUS_PROCESSING = "processing";
    const STATUS_HOLD = "hold";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";
    const STATUS_REVERSED = "reversed";
    const STATUS_EXPIRED = "expired";

    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $failureReason = "";

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $ccy;

    /**
     * @var int
     */
    protected $finalAmount;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $modifiedDate;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var array|CancelListItem[]
     */
    protected $cancelList = [];

    /**
     * @var array|SplitListItem[]
     */
    protected $splitList = [];

    /**
     * @param string      $invoiceId
     * @param string      $status
     * @param int         $amount
     * @param int         $ccy
     * @param int         $finalAmount
     * @param string|null $reference
     * @param string|null $createdDate
     * @param string|null $modifiedDate
     * @param string|null $failureReason
     * @param array       $cancelList
     * @param array       $splitList
     */
    public function __construct(
        string $invoiceId,
        string $status,
        int $amount,
        int $ccy,
        int $finalAmount,
        ?string $reference = null,
        ?string $createdDate = null,
        ?string $modifiedDate = null,
        ?string $failureReason = null,
        array $cancelList = [],
        array $splitList = []
    ) {
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->finalAmount = $finalAmount;
        $this->reference = $reference;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;
        $this->failureReason = $failureReason;
        $this->cancelList = $cancelList;
        $this->splitList = $splitList;
    }

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getFailureReason(): string
    {
        return $this->failureReason;
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
     * @return int
     */
    public function getFinalAmount(): int
    {
        return $this->finalAmount;
    }

    /**
     * @return string|null
     */
    public function getCreatedDateRaw(): ?string
    {
        return $this->createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getCreatedDateRaw());
    }

    /**
     * @return string|null
     */
    public function getModifiedDateRaw(): ?string
    {
        return $this->modifiedDate;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getModifiedDateRaw());
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return array|CancelListItem[]
     */
    public function getCancelList(): array
    {
        return $this->cancelList;
    }

    /**
     * @return array|SplitListItem[]
     */
    public function getSplitList(): array
    {
        return $this->splitList;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "invoiceId" => $this->getInvoiceId(),
            "status" => $this->getStatus(),
            "amount" => $this->getAmount(),
            "ccy" => $this->getCcy(),
            "finalAmount" => $this->getFinalAmount(),

            "reference" => $this->getReference(),
            "createdDate" => $this->getCreatedDateRaw(),
            "modifiedDate" => $this->getModifiedDateRaw(),
            "failureReason" => $this->getFailureReason(),

            "cancelList" => array_map(function (CancelListItem $cancelListItem): array {
                return $cancelListItem->toArray();
            }, $this->getCancelList()),

            "splitList" => array_map(function (SplitListItem $splitListItem): array {
                return $splitListItem->toArray();
            }, $this->getSplitList()),
        ];
    }

    /**
     * @param array $data
     *
     * @return Status
     */
    public static function fromArray(array $data): Status
    {
        return new self(
            $data['invoiceId'],
            $data['status'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],

            $data['reference'] ?? null,
            $data['createdDate'] ?? null,
            $data['modifiedDate'] ?? null,
            $data['failureReason'] ?? "",

            array_map(function ($cancelListItem): CancelListItem {
                return CancelListItem::fromArray($cancelListItem);
            }, $data['cancelList'] ?? []),
            array_map(function ($splitListItem): SplitListItem {
                return SplitListItem::fromArray($splitListItem);
            }, $data['splitList'] ?? null)
        );
    }
}
