<?php

namespace Maksa988\MonobankAcquiring\Responses\Wallet;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Models\NoContent;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class DeleteCardResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return ModelInterface
     */
    public function toModel(array $response): ModelInterface
    {
        return NoContent::fromArray($response);
    }
}
