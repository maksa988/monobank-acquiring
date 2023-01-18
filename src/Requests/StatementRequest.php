<?php

namespace Maksa988\MonobankAcquiring\Requests;

use Maksa988\MonobankAcquiring\Responses\StatementResponse;

class StatementRequest implements RequestInterface
{
    /**
     * @var int
     */
    public $from;

    /**
     * @var int|null
     */
    public $to;

    /**
     * Statement constructor.
     * @param int $from
     * @param int|null $to
     */
    public function __construct(int $from, ?int $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return array<int, int|null>
     */
    public function toArray(): array
    {
        return [
            "from" => $this->from,
            "to" => $this->to
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/statement";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "GET";
    }

    /**
     * @return StatementResponse
     */
    public function response(): StatementResponse
    {
        return new StatementResponse();
    }
}
