<?php

namespace Maksa988\MonobankAcquiring;

use Maksa988\MonobankAcquiring\Exceptions\InvalidXTokenException;

class Config
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var int
     */
    protected $connectionTimeout;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @param string $token
     * @param int    $connectionTimeout
     * @param string $baseUri
     *
     * @throws InvalidXTokenException
     */
    public function __construct(string $token, int $connectionTimeout = 10, string $baseUri = 'https://api.monobank.ua/')
    {
        if(empty($token)) {
            throw new InvalidXTokenException("Please set valid X-Token in config");
        }

        $this->token = $token;
        $this->connectionTimeout = $connectionTimeout;
        $this->baseUri = $baseUri;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return int
     */
    public function getConnectionTimeout()
    {
        return $this->connectionTimeout;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }
}
