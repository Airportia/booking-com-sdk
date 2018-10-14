<?php

namespace BookingCom\Models;

class ChainType extends AbstractModel
{
    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * ChainType constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * @param array $array
     * @return ChainType
     */
    public static function fromArray(array $array): ChainType
    {
        return new self($array['chain_id'], $array['name']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
