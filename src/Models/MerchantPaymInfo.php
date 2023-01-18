<?php

namespace Maksa988\MonobankAcquiring\Models;

class MerchantPaymInfo implements ModelInterface
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var array<int, BasketOrder>
     */
    private $basketOrder = [];

    /**
     * @param string $reference
     * @param string $destination
     */
    public function __construct(string $reference = '', string $destination = '')
    {
        $this->reference = $reference;
        $this->destination = $destination;
    }

    /**
     * @return array<string, array<int, array<string, int|string|null>>|string>
     */
    public function toArray(): array
    {
        return [
            'reference' => $this->reference,
            'destination' => $this->destination,
            'basketOrder' => array_map(function (BasketOrder $basketOrder): array {
                return $basketOrder->toArray();
            }, $this->basketOrder)
        ];
    }

    /**
     * @param BasketOrder $order
     */
    public function addBasketOrder(BasketOrder $order): void
    {
        $this->basketOrder[] = $order;
    }

    /**
     * @param array $data
     *
     * @return MerchantPaymInfo
     */
    public static function fromArray(array $data): MerchantPaymInfo
    {
        return new self($data['reference'] ?? '', $data['destination'] ?? '');
    }
}
