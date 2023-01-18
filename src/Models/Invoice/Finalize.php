<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

class Finalize implements ModelInterface
{
    const STATUS_SUCCESS = "success";

    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $status
     */
    public function __construct(string $status = self::STATUS_SUCCESS)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "status" => $this->getStatus(),
        ];
    }

    /**
     * @param array $data
     *
     * @return Finalize
     */
    public static function fromArray(array $data): Finalize
    {
        return new self(
            $data['status'],
        );
    }
}
