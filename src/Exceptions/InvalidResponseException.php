<?php

namespace Maksa988\MonobankAcquiring\Exceptions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class InvalidResponseException extends \Exception
{
    /**
     * @var ResponseInterface
     */
    private ResponseInterface $response;

    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * ErrorResponseException constructor.
     * @param ResponseInterface $response
     * @param RequestInterface $request
     */
    public function __construct(ResponseInterface $response, RequestInterface $request)
    {
        parent::__construct($response->getBody()->getContents(), $response->getStatusCode());

        $this->response = $response;
        $this->request = $request;
    }

    /**
     * @return RequestInterface|null
     */
    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
