<?php

namespace BookingCom\Models\City;


use BookingCom\BookingObject;

class Timezone extends BookingObject
{
    /** @var int */
    private $offset;

    /** @var string */
    private $name;

    /**
     * Timezone constructor.
     *
     * @param int    $offset
     * @param string $name
     */
    public function __construct(int $offset, string $name)
    {
        $this->offset = $offset;
        $this->name   = $name;
    }

    /**
     * @param array $array
     * @return Timezone
     */
    public static function fromArray(array $array): Timezone
    {
        return new self($array['offset'], $array['name']);
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}