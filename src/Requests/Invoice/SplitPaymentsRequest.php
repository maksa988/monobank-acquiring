<?php

namespace Maksa988\MonobankAcquiring\Requests\Invoice;

use Maksa988\MonobankAcquiring\Exceptions\SplitListEmptyException;
use Maksa988\MonobankAcquiring\Models\SplitListItem;
use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Invoice\SplitPaymentsResponse;

class SplitPaymentsRequest implements RequestInterface
{
    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var array|SplitListItem[]
     */
    protected $splitList = [];

    /**
     * @param string $invoiceId
     * @param array  $splitList
     *
     * @throws SplitListEmptyException
     */
    public function __construct(string $invoiceId, array $splitList)
    {
        $this->invoiceId = $invoiceId;
        $this->splitList = $splitList;

        if(empty($this->splitList)) {
            throw new SplitListEmptyException("Please fill SplitListItems");
        }
    }

    /**
     * @return array<string, array<string, array<int, array<string,int|string|null>>|string>|int|string|null>
     */
    public function toArray(): array
    {
        return [
            'invoiceId' => $this->invoiceId,
            'splitList' => array_map(function (SplitListItem $splitListItem): array {
                return $splitListItem->toArray();
            }, $this->splitList),
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/invoice/split-payments";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return SplitPaymentsResponse
     */
    public function response(): SplitPaymentsResponse
    {
        return new SplitPaymentsResponse();
    }
}
