<?php

namespace BookingCom\Models\Facility;


use BookingCom\BookingObject;

class FacilityType extends BookingObject
{
    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * Facility constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(int $id,
        string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * @param array $array
     * @return FacilityType
     */
    public static function fromArray(array $array): FacilityType
    {
        return new self($array['facility_type_id'], $array['name']);
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