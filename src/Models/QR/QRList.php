<?php

namespace Maksa988\MonobankAcquiring\Models\QR;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Models\QRListItem;

class QRList implements ModelInterface
{
    /**
     * @var array|QRListItem[]
     */
    protected $list;

    /**
     * @param array $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return array|QRListItem[]
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "list" => array_map(function (QRListItem $qrListItem): array {
                return $qrListItem->toArray();
            }, $this->getList()),
        ];
    }

    /**
     * @param array $data
     *
     * @return QRList
     */
    public static function fromArray(array $data): QRList
    {
        return new self(
            array_map(function (array $qrListItem): QRListItem {
                return QRListItem::fromArray($qrListItem);
            }, $data['list'] ?? []),
        );
    }
}
