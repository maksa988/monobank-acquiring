<?php

namespace Maksa988\MonobankAcquiring\Requests\QR;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\QR\ResetAmountResponse;

class ResetAmountRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $qrId;

    /**
     * Create constructor.
     *
     * @param string      $qrId
     */
    public function __construct(string $qrId)
    {
        $this->qrId = $qrId;
    }

    /**
     * @return array<string>
     */
    public function toArray(): array
    {
        return [
            "qrId" => $this->qrId,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/qr/reset-amount";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return ResetAmountResponse
     */
    public function response(): ResetAmountResponse
    {
        return new ResetAmountResponse();
    }
}
