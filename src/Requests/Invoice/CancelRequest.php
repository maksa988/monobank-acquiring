<?php

namespace Maksa988\MonobankAcquiring\Requests\Invoice;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Invoice\CancelResponse;

class CancelRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $invoiceId;

    /**
     * @var string|null
     */
    public $extRef;

    /**
     * @var int|null
     */
    public $amount;

    /**
     * Create constructor.
     *
     * @param string      $invoiceId
     * @param string|null $extRef
     * @param int|null    $amount
     */
    public function __construct(string $invoiceId, ?string $extRef = null, ?int $amount = null)
    {
        $this->invoiceId = $invoiceId;
        $this->extRef = $extRef;
        $this->amount = $amount;
    }

    /**
     * @return array<string, string, string>
     */
    public function toArray(): array
    {
        return [
            "invoiceId" => $this->invoiceId,
            "extRef" => $this->extRef,
            "amount" => $this->amount,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/cancel";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return CancelResponse
     */
    public function response(): CancelResponse
    {
        return new CancelResponse();
    }
}
