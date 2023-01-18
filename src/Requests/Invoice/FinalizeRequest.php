<?php

namespace Maksa988\MonobankAcquiring\Requests\Invoice;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Invoice\FinalizeResponse;

class FinalizeRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $invoiceId;

    /**
     * @var int|null
     */
    public $amount;

    /**
     * Create constructor.
     *
     * @param string   $invoiceId
     * @param int|null $amount
     */
    public function __construct(string $invoiceId, ?int $amount = null)
    {
        $this->invoiceId = $invoiceId;
        $this->amount = $amount;
    }

    /**
     * @return array<string, int|null>
     */
    public function toArray(): array
    {
        return [
            "invoiceId" => $this->invoiceId,
            "amount" => $this->amount,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/finalize";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return FinalizeResponse
     */
    public function response(): FinalizeResponse
    {
        return new FinalizeResponse();
    }
}
