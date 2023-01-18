<?php

namespace Maksa988\MonobankAcquiring\Models\Wallet;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\MonobankAcquiring;

class Payment implements ModelInterface
{
    const STATUS_PROCESSING = "processing";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";

    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var string
     */
    protected $status;

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
    protected $createdDate;

    /**
     * @var string
     */
    protected $modifiedDate;

    /**
     * @var string|null
     */
    protected $tdsUrl;

    /**
     * @var string|null
     */
    protected $failureReason;

    /**
     * @param string      $invoiceId
     * @param string      $status
     * @param int         $amount
     * @param int         $ccy
     * @param string      $createdDate
     * @param string      $modifiedDate
     * @param string|null $tdsUrl
     * @param string|null $failureReason
     */
    public function __construct(
        string $invoiceId,
        string $status,
        int $amount,
        int $ccy,
        string $createdDate,
        string $modifiedDate,
        string $tdsUrl = null,
        string $failureReason = null
    )
    {
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;
        $this->tdsUrl = $tdsUrl;
        $this->failureReason = $failureReason;
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
     * @return string|null
     */
    public function getTdsUrl(): ?string
    {
        return $this->tdsUrl;
    }

    /**
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
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

    public function toArray(): array
    {
        return [
            'invoiceId' => $this->getInvoiceId(),
            'tdsUrl' => $this->getTdsUrl(),
            'status' => $this->getStatus(),
            'failureReason' => $this->getFailureReason(),
            'amount' => $this->getAmount(),
            'ccy' => $this->getCcy(),
            'createdDate' => $this->getCreatedDateRaw(),
            'modifiedDate' => $this->getModifiedDateRaw()
        ];
    }

    /**
     * @param array $data
     *
     * @return Payment
     */
    public static function fromArray(array $data): Payment
    {
        return new Payment(
            $data['invoiceId'],
            $data['status'],
            $data['amount'],
            $data['ccy'],
            $data['createdDate'],
            $data['modifiedDate'],
            $data['tdsUrl'] ?? null,
            $data['failureReason'] ?? null
        );
    }
}
