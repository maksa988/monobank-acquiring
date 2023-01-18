<?php

namespace Maksa988\MonobankAcquiring;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Maksa988\MonobankAcquiring\Exceptions\InvalidResponseException;
use Maksa988\MonobankAcquiring\Models\ModelInterface;
use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\ResponseInterface;

class ApiClient
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Client|null
     */
    protected $client;

    /**
     * @param Config $config
     *
     * @throws \Exception
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = $this->getClient();
    }

    /**
     * @param string $url
     * @param string $method
     * @param array<string, string|int|array> $query
     * @param ResponseInterface $response
     * @phpstan-ignore-next-line
     * @param array $options
     * @return ModelInterface
     * @throws InvalidResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(
        string $url,
        string $method,
        array $query,
        ResponseInterface $response,
        array $options = []
    ): ModelInterface {
        $defaultOptions = [];

        if ($method === 'GET') {
            $defaultOptions['query'] = $query;
        } else {
            $defaultOptions['json'] = $query;
        }

        try {
            $_response = $this->getClient()->request($method, $url, array_merge($defaultOptions, $options));

            $data = json_decode($_response->getBody()->getContents(), true);

            return $response->toModel($data);
        } catch (BadResponseException $e) {
            throw new InvalidResponseException($e->getResponse(), $e->getRequest());
        }
    }

    /**
     * @param RequestInterface $request
     * @param array<string, string|int|array<string, string>> $options
     * @return ModelInterface
     * @throws InvalidResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function call(RequestInterface $request, array $options = []): ModelInterface
    {
        return $this->execute(
            $request->url(),
            $request->httpMethod(),
            $request->toArray(),
            $request->response(),
            $options
        );
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Client
     * @throws \Exception
     */
    protected function getClient(): Client
    {
        if (null !== $this->client) {
            return $this->client;
        }

        return $this->client = new Client([
            'base_uri' => $this->config->getBaseUri(),
            'connect_timeout' => $this->config->getConnectionTimeout(),
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Token' => $this->config->getToken(),
            ]
        ]);
    }
}
