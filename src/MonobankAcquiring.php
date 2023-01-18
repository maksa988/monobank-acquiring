<?php

namespace Maksa988\MonobankAcquiring;

use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Requests\RequestInterface;

class MonobankAcquiring
{
    const DATE_FORMAT = "Y-m-d\TH:i:sP";

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @param Config         $config
     * @param ApiClient|null $apiClient
     *
     * @throws \Exception
     */
    public function __construct(Config $config, ApiClient $apiClient = null)
    {
        $this->config = $config;
        $this->apiClient = $apiClient ?? new ApiClient($config);
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return ModelInterface
     * @throws Exceptions\InvalidResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function call(RequestInterface $request, array $options = []): ModelInterface
    {
        return $this->apiClient->call($request, $options);
    }
}
