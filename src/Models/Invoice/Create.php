<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

class Create implements ModelInterface
{
    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var string
     */
    protected $pageUrl;

    /**
     * @param string $invoiceId
     * @param string $pageUrl
     */
    public function __construct(string $invoiceId, string $pageUrl)
    {
        $this->invoiceId = $invoiceId;
        $this->pageUrl = $pageUrl;
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
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "invoiceId" => $this->getInvoiceId(),
            "pageUrl" => $this->getPageUrl(),
        ];
    }

    /**
     * @param array $data
     *
     * @return Create
     */
    public static function fromArray(array $data): Create
    {
        return new self(
            $data['invoiceId'],
            $data['pageUrl']
        );
    }
}
