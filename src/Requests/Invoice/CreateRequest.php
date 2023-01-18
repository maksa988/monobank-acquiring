<?php

namespace Maksa988\MonobankAcquiring\Requests\Invoice;

use Maksa988\MonobankAcquiring\Models\MerchantPaymInfo;
use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Invoice\CreateResponse;

class CreateRequest implements RequestInterface
{
    public const PAYMENT_TYPE_DEBIT = 'debit';
    public const PAYMENT_TYPE_HOLD = 'hold';

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var MerchantPaymInfo|null
     */
    protected $merchantPaymInfo;

    /**
     * @var int|null
     */
    protected $ccy;

    /**
     * @var string|null
     */
    protected $redirectUrl;

    /**
     * @var string|null
     */
    protected $webHookUrl;

    /**
     * @var int|null
     */
    protected $validity;

    /**
     * @var string|null
     */
    protected $paymentType = self::PAYMENT_TYPE_DEBIT;

    /**
     * @var string|null
     */
    protected $qrId = "";

    /**
     * Create constructor.
     * @param int $amount
     * @param MerchantPaymInfo|null $merchantPaymInfo
     * @param int|null $ccy
     * @param string|null $redirectUrl
     * @param string|null $webHookUrl
     * @param int|null $validity
     * @param string|null $paymentType
     * @param string|null $qrId
     */
    public function __construct(
        int $amount,
        ?string $redirectUrl = null,
        ?string $webHookUrl = null,
        ?MerchantPaymInfo $merchantPaymInfo = null,
        ?int $ccy = null,
        ?int $validity = null,
        ?string $paymentType = null,
        ?string $qrId = null
    ) {
        $this->amount = $amount;
        $this->merchantPaymInfo = $merchantPaymInfo;
        $this->ccy = $ccy;
        $this->redirectUrl = $redirectUrl;
        $this->webHookUrl = $webHookUrl;
        $this->validity = $validity;
        $this->paymentType = $paymentType;
        $this->qrId = $qrId;
    }

    /**
     * @return array<string, array<string, array<int, array<string,int|string|null>>|string>|int|string|null>
     */
    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'merchantPaymInfo' => $this->merchantPaymInfo ? $this->merchantPaymInfo->toArray() : [],
            'ccy' => $this->ccy,
            'redirectUrl' => $this->redirectUrl,
            'webHookUrl' => $this->webHookUrl,
            'validity' => $this->validity,
            'paymentType' => $this->paymentType,
            'qrId' => $this->qrId,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/create";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return CreateResponse
     */
    public function response(): CreateResponse
    {
        return new CreateResponse();
    }
}
