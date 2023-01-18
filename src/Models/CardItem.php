<?php

namespace Maksa988\MonobankAcquiring\Models;

class CardItem implements ModelInterface
{
    /**
     * @var string
     */
    protected $pan;

    /**
     * @var string
     */
    protected $exp;

    /**
     * @var string
     */
    protected $cvv;

    /**
     * @param string $pan
     * @param string $exp
     * @param string $cvv
     */
    public function __construct(string $pan, string $exp, string $cvv)
    {
        $this->pan = $pan;
        $this->exp = $exp;
        $this->cvv = $cvv;
    }

    /**
     * @return string
     */
    public function getPan(): string
    {
        return $this->pan;
    }

    /**
     * @return string
     */
    public function getExp(): string
    {
        return $this->exp;
    }

    /**
     * @return string
     */
    public function getCvv(): string
    {
        return $this->cvv;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "pan" => $this->getPan(),
            "exp" => $this->getExp(),
            "cvv" => $this->getCvv()
        ];
    }

    /**
     * @param array $data
     *
     * @return CardItem
     */
    public static function fromArray(array $data): CardItem
    {
        return new self($data['pan'], $data['exp'], $data['cvv']);
    }
}
