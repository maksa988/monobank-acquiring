<?php

namespace Maksa988\MonobankAcquiring\Models;

interface ModelInterface
{
    /** @return array */
    public function toArray(): array;

    /**
     * @param array $data
     *
     * @return ModelInterface
     */
    public static function fromArray(array $data): self;
}
