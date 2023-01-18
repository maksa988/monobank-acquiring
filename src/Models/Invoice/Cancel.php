<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\MonobankAcquiring;

class Cancel implements ModelInterface
{
    const STATUS_PROCESSING = "processing";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $modifiedDate;

    /**
     * @param string $status
     * @param string $createdDate
     * @param string $modifiedDate
     */
    public function __construct(string $status, string $createdDate, string $modifiedDate)
    {
        $this->status = $status;
        $this->createdDate = $createdDate;
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCreatedDateRaw(): string
    {
        return $this->createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getCreatedDateRaw());
    }

    /**
     * @return string
     */
    public function getModifiedDateRaw(): string
    {
        return $this->modifiedDate;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedDate(): \DateTime
    {
        return \DateTime::createFromFormat(MonobankAcquiring::DATE_FORMAT, $this->getModifiedDateRaw());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "status" => $this->getStatus(),
            "createdDate" => $this->getCreatedDateRaw(),
            "modifiedDate" => $this->getModifiedDateRaw(),
        ];
    }

    /**
     * @param array $data
     *
     * @return Cancel
     */
    public static function fromArray(array $data): Cancel
    {
        return new self(
            $data['status'],
            $data['createdDate'],
            $data['modifiedDate']
        );
    }
}
