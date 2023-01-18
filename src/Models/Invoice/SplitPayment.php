<?php

namespace Maksa988\MonobankAcquiring\Models\Invoice;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

class SplitPayment implements ModelInterface
{
    /**
     * @var string
     */
    protected $reference;

    /**
     * @param string $reference
     */
    public function __construct(string $reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    public function toArray(): array
    {
        return [
            'reference' => $this->getReference(),
        ];
    }

    /**
     * @param array $data
     *
     * @return SplitPayment
     */
    public static function fromArray(array $data): SplitPayment
    {
        return new self($data['reference']);
    }
}
