<?php

namespace Maksa988\MonobankAcquiring\Responses;

use Maksa988\MonobankAcquiring\Models\ModelInterface;

interface ResponseInterface
{
    /**
     * @param array $response
     *
     * @return ModelInterface
     */
    public function toModel(array $response): ModelInterface;
}
