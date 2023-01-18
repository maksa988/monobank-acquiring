<?php

namespace Maksa988\MonobankAcquiring\Models;

class PubKey implements ModelInterface
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "key" => $this->getKey(),
        ];
    }

    /**
     * @param array $data
     *
     * @return PubKey
     */
    public static function fromArray(array $data): PubKey
    {
        return new self($data['key']);
    }
}
