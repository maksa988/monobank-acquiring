<?php

namespace Maksa988\MonobankAcquiring\Requests\Invoice;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Invoice\StatusResponse;

class StatusRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $invoiceId;

    /**
     * Create constructor.
     *
     * @param string $invoiceId
     */
    public function __construct(string $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @return array<string>
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/status";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return StatusResponse
     */
    public function response(): StatusResponse
    {
        return new StatusResponse();
    }
}
