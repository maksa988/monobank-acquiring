<?php

namespace Maksa988\MonobankAcquiring\Requests\QR;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\QR\DetailsResponse;

class DetailsRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $qrId;

    /**
     * @param string $qrId
     */
    public function __construct(string $qrId)
    {
        $this->qrId = $qrId;
    }

    /**
     * @return array<string, int|null>
     */
    public function toArray(): array
    {
        return [
            'qrId' => $this->qrId,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/qr/details";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return DetailsResponse
     */
    public function response(): DetailsResponse
    {
        return new DetailsResponse();
    }
}
