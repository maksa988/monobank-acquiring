<?php

namespace Maksa988\MonobankAcquiring\Models;

class SplitListItem implements ModelInterface
{
    const STATUS_CREATED = "created";
    const STATUS_PROCESSING = "processing";
    const STATUS_SUCCESS = "success";
    const STATUS_FAILURE = "failure";

    /**
     * @var string
     */
    protected $tin;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $iban;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $ccy;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $destination = null;

    /**
     * @param string      $tin
     * @param string      $name
     * @param string      $iban
     * @param int         $amount
     * @param int         $ccy
     * @param string|null $destination
     * @param string|null $status
     */
    public function __construct(
        string $tin,
        string $name,
        string $iban,
        int $amount,
        int $ccy,
        ?string $destination = null,
        ?string $status = self::STATUS_CREATED
    ) {
        $this->tin = $tin;
        $this->name = $name;
        $this->iban = $iban;
        $this->amount = $amount;
        $this->ccy = $ccy;
        $this->destination = $destination;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTin(): string
    {
        return $this->tin;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getCcy(): int
    {
        return $this->ccy;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "tin" => $this->getTin(),
            "name" => $this->getName(),
            "iban" => $this->getIban(),
            "amount" => $this->getAmount(),
            "ccy" => $this->getCcy(),
            "destination" => $this->getDestination(),
            "status" => $this->getStatus(),
        ];
    }

    /**
     * @param array $data
     *
     * @return SplitListItem
     */
    public static function fromArray(array $data): SplitListItem
    {
        return new self(
            $data['tin'],
            $data['name'],
            $data['iban'],
            $data['amount'],
            $data['ccy'],
            $data['destination'] ?? null,
            $data['status'] ?? null
        );
    }
}
