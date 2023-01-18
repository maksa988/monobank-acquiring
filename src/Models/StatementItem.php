<?php

namespace Maksa988\MonobankAcquiring\Models;

use Maksa988\MonobankAcquiring\MonobankAcquiring;

class StatementItem implements ModelInterface
{
    const STATUS_HOLD = "hold";
    const STATUS_PROCESSING = "processing";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";

    const PAYMENT_SCHEME_FULL = "full";
    const PAYMENT_BNPL_PARTS_4 = "bnpl_parts_4";
    const PAYMENT_BNPL_LATER_30 = "bnpl_later_30";

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
    protected $maskedPan;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $paymentScheme;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $profitAmount;

    /**
     * @var int
     */
    protected $ccy;

    /**
     * @var string|null
     */
    protected $approvalCode;

    /**
     * @var string|null
     */
    protected $rrn;

    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @var string|null
     */
    protected $shortQrId;

    /**
     * @var array|StatementCancelListItem
     */
    protected $cancelList;

    /**
     * @param string                        $invoiceId
     * @param string                        $status
     * @param string                        $maskedPan
     * @param string                        $date
     * @param string                        $paymentScheme
     * @param int                           $amount
     * @param int                           $profitAmount
     * @param int                           $ccy
     * @param string|null                   $approvalCode
     * @param string|null                   $rrn
     * @param string|null                   $reference
     * @param string|null                   $shortQrId
     * @param array|StatementCancelListItem $cancelList
     */
    public function __construct(
        string $invoiceId,
        string $status,
        string $maskedPan,
        string $date,
        string $paymentScheme,
        int $amount,
        int $profitAmount,
        int $ccy,
        ?string $approvalCode = null,
        ?string $rrn = null,
        ?string $reference = null,
        ?string $shortQrId = null,
        array $cancelList = []
    ) {
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->maskedPan = $maskedPan;
        $this->date = $date;
        $this->paymentScheme = $paymentScheme;
        $this->amount = $amount;
        $this->profitAmount = $profitAmount;
        $this->ccy = $ccy;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->reference = $reference;
        $this->shortQrId = $shortQrId;
        $this->cancelList = $cancelList;
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
    public function getMaskedPan(): string
    {
        return $this->maskedPan;
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
    public function getPaymentScheme(): string
    {
        return $this->paymentScheme;
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
    public function getProfitAmount(): int
    {
        return $this->profitAmount;
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
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return array|StatementCancelListItem
     */
    public function getCancelList()
    {
        return $this->cancelList;
    }

    /**
     * @return string|null
     */
    public function getShortQrId(): ?string
    {
        return $this->shortQrId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->getInvoiceId(),
            'status' => $this->getStatus(),
            'maskedPen' => $this->getMaskedPan(),
            'date' => $this->getDateRaw(),
            'paymentScheme' => $this->getPaymentScheme(),
            'amount' => $this->getAmount(),
            'profitAmount' => $this->getProfitAmount(),
            'ccy' => $this->getCcy(),
            'approvalCode' => $this->getApprovalCode(),
            'rrn' => $this->getRrn(),
            'reference' => $this->getReference(),
            'shortQrId' => $this->getShortQrId(),

            'cancelList' => array_map(function (StatementCancelListItem $model) {
                return $model->toArray();
            }, $this->cancelList)
        ];
    }

    /**
     * @param array $data
     *
     * @return StatementItem
     */
    public static function fromArray(array $data): StatementItem
    {
        return new self(
            $data['invoiceId'],
            $data['status'],
            $data['maskedPan'],
            $data['date'],
            $data['paymentScheme'],
            $data['amount'],
            $data['profitAmount'],
            $data['ccy'],
            $data['approvalCode'] ?? null,
            $data['rrn'] ?? null,
            $data['reference'] ?? null,
            $data['shortQrId'] ?? null,

            array_map(function (array $cancelListItem): StatementCancelListItem {
                return StatementCancelListItem::fromArray($cancelListItem);
            }, $data['cancelList'] ?? []),
        );
    }
}
