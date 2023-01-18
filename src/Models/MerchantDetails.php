<?php

namespace Maksa988\MonobankAcquiring\Models;

class MerchantDetails implements ModelInterface
{
    /**
     * @var string
     */
    protected $merchantId;

    /**
     * @var string
     */
    protected $merchantName;

    /**
     * @param string $merchantId
     * @param string $merchantName
     */
    public function __construct(string $merchantId, string $merchantName)
    {
        $this->merchantId = $merchantId;
        $this->merchantName = $merchantName;
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getMerchantName(): string
    {
        return $this->merchantName;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "merchantId" => $this->getMerchantId(),
            "merchantName" => $this->getMerchantName(),
        ];
    }

    /**
     * @param array $data
     *
     * @return MerchantDetails
     */
    public static function fromArray(array $data): MerchantDetails
    {
        return new self($data['merchantId'], $data['merchantName']);
    }
}
