<?php

namespace Maksa988\MonobankAcquiring\Models\Wallet;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Models\WalletItem;

class Wallet implements ModelInterface
{
    /**
     * @var array|WalletItem[]
     */
    protected $wallet;

    /**
     * @param array $wallet
     */
    public function __construct(array $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * @return array|WalletItem[]
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "wallet" => array_map(function (WalletItem $walletItem): array {
                return $walletItem->toArray();
            }, $this->getWallet()),
        ];
    }

    /**
     * @param array $data
     *
     * @return Wallet
     */
    public static function fromArray(array $data): Wallet
    {
        return new self(
            array_map(function (array $walletItem): WalletItem {
                return WalletItem::fromArray($walletItem);
            }, $data['wallet'] ?? []),
        );
    }
}
