<?php

namespace Maksa988\MonobankAcquiring\Models;

class NoContent implements ModelInterface
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @param array $data
     *
     * @return NoContent
     */
    public static function fromArray(array $data): NoContent
    {
        return new self();
    }
}
