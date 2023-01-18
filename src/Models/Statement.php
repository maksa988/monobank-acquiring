<?php

namespace Maksa988\MonobankAcquiring\Models;

class Statement implements ModelInterface
{
    /**
     * @var array|StatementItem[]
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
     * @return array|StatementItem[]
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
            "list" => array_map(function (StatementItem $statementItem): array {
                return $statementItem->toArray();
            }, $this->getList()),
        ];
    }

    /**
     * @param array $data
     *
     * @return Statement
     */
    public static function fromArray(array $data): Statement
    {
        return new self(
            array_map(function (array $statementItem): StatementItem {
                return StatementItem::fromArray($statementItem);
            }, $data['list'] ?? []),
        );
    }
}
