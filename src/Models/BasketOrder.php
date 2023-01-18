<?php

namespace Maksa988\MonobankAcquiring\Models;

class BasketOrder implements ModelInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $qty;

    /**
     * @var int
     */
    public $sum;

    /**
     * @var string|null
     */
    public $icon;

    /**
     * @var string|null
     */
    public $unit;

    /**
     * BasketOrder constructor.
     * @param string $name
     * @param int $qty
     * @param int $sum
     * @param string|null $icon
     * @param string|null $unit
     */
    public function __construct(string $name, int $qty, int $sum, ?string $icon = null, ?string $unit = null)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->sum = $sum;
        $this->icon = $icon;
        $this->unit = $unit;
    }

    /**
     * @return array<string, string|null|int>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'qty' => $this->qty,
            'sum' => $this->sum,
            'icon' => $this->icon,
            'unit' => $this->unit
        ];
    }

    /**
     * @param array $data
     *
     * @return BasketOrder
     */
    public static function fromArray(array $data): BasketOrder
    {
        return new self(
            $data['name'],
            $data['qty'],
            $data['sum'],
            $data['icon'] ?? null,
            $data['unit'] ?? null,
        );
    }
}
