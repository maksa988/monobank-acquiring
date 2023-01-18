<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\CancelListItem;
use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\MonobankAcquiring;

class PaymentInfo implements ModelInterface
{
    const PAYMENT_SCHEME_FULL = "full";
    const PAYMENT_BNPL_PARTS_4 = "bnpl_parts_4";
    const PAYMENT_BNPL_LATER_30 = "bnpl_later_30";

    const PAYMENT_METHOD_PAN = "pan";
    const PAYMENT_METHOD_APPLE = "apple";
    const PAYMENT_METHOD_GOOGLE = "google";
    const PAYMENT_METHOD_MONOBANK = "monobank";
    const PAYMENT_METHOD_MONOPAY = "monopay";

    /**
     * @var string
     */
    protected $maskedPan;

    /**
     * @var string
     */
    protected $approvalCode;

    /**
     * @var string
     */
    protected $rrn;

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
     * @var string|null
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $terminal;

    /**
     * @var string
     */
    protected $paymentScheme;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var bool
     */
    protected $domesticCard;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var int|null
     */
    protected $fee;

    /**
     * @var array|CancelListItem[]
     */
    protected $cancelList;

    /**
     * @param string      $maskedPan
     * @param string      $approvalCode
     * @param string      $rrn
     * @param int         $amount
     * @param int         $ccy
     * @param int         $finalAmount
     * @param string|null $createdDate
     * @param string      $terminal
     * @param string      $paymentScheme
     * @param string      $paymentMethod
     * @param bool        $domesticCard
     * @param string      $country
     * @param int|null    $fee
     * @param array|CancelListItem[]       $cancelList
     */
    public function __construct(
        string $maskedPan,
        string $approvalCode,
        string $rrn,
        int $amount,
        int $ccy,
        int $finalAmount,
        string $createdDate,
        string $terminal,
        string $paymentScheme,
        string $paymentMethod,
        bool $domesticCard,
        string $country,
        ?int $fee = null,
        array $cancelList = []
    ) {
        $this->maskedPan = $maskedPan;
        $this->approvalCode = $approvalCode;
        $this->rrn = $rrn;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->finalAmount = $finalAmount;
        $this->createdDate = $createdDate;
        $this->terminal = $terminal;
        $this->paymentScheme = $paymentScheme;
        $this->paymentMethod = $paymentMethod;
        $this->domesticCard = $domesticCard;
        $this->country = $country;
        $this->fee = $fee;
        $this->cancelList = $cancelList;
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
    public function getApprovalCode(): string
    {
        return $this->approvalCode;
    }

    /**
     * @return string
     */
    public function getRrn(): string
    {
        return $this->rrn;
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
     * @return string
     */
    public function getTerminal(): string
    {
        return $this->terminal;
    }

    /**
     * @return string
     */
    public function getPaymentScheme(): string
    {
        return $this->paymentScheme;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return bool
     */
    public function isDomesticCard(): bool
    {
        return $this->domesticCard;
    }

    /**
     * @return int|null
     */
    public function getFee(): ?int
    {
        return $this->fee;
    }

    /**
     * @return array|CancelListItem[]
     */
    public function getCancelList(): array
    {
        return $this->cancelList;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'maskedPan' => $this->getMaskedPan(),
            'approvalCode' => $this->getApprovalCode(),
            'rrn' => $this->getRrn(),
            'amount' => $this->getAmount(),
            'ccy' => $this->getCcy(),
            'finalAmount' => $this->getFinalAmount(),
            'createdDate' => $this->getCreatedDateRaw(),
            'terminal' => $this->getTerminal(),
            'paymentScheme' => $this->getPaymentScheme(),
            'paymentMethod' => $this->getPaymentMethod(),
            'fee' => $this->getFee(),
            'domesticCard' => $this->isDomesticCard(),
            'country' => $this->getCountry(),

            'cancelList' => array_map(function (CancelListItem $item): array {
                return $item->toArray();
            }, $this->getCancelList())
        ];
    }

    /**
     * @param array $data
     *
     * @return PaymentInfo
     */
    public static function fromArray(array $data): PaymentInfo
    {
        return new self(
            $data['maskedPan'],
            $data['approvalCode'],
            $data['rrn'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],
            $data['createdDate'],
            $data['terminal'],
            $data['paymentScheme'],
            $data['paymentMethod'],
            $data['domesticCard'],
            $data['country'],
            $data['fee'] ?? null,

            array_map(function ($cancelListItem): CancelListItem {
                return CancelListItem::fromArray($cancelListItem);
            }, $data['cancelList'] ?? []),
        );
    }
}
