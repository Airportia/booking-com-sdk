<?php

namespace BookingCom\Models\Bed;


use BookingCom\BookingObject;

class BedroomDescription extends BookingObject
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $description;

    /**
     * BedroomDescription constructor.
     *
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name        = $name;
        $this->description = $description;
    }

    public static function fromArray(array $array): BedroomDescription
    {
        return new self($array['name'], $array['description']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}