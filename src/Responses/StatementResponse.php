<?php

namespace Maksa988\MonobankAcquiring\Responses;

use Maksa988\MonobankAcquiring\Models\Statement;

class StatementResponse implements ResponseInterface
{
    /**
     * @param array $response
     *
     * @return Statement
     */
    public function toModel(array $response): Statement
    {
        return Statement::fromArray($response);
    }
}
