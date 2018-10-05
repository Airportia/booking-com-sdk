<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;

class HotelFacilityType extends BookingObject
{
    /** @var  integer */
    private $id;

    /** @var  string */
    private $type;

    /** @var  integer */
    private $facilityTypeId;

    /** @var  string */
    private $name;

    /**
     * HotelFacilityType constructor.
     *
     * @param int    $id
     * @param string $type
     * @param int    $facilityTypeId
     * @param string $name
     */
    public function __construct(int $id, string $type, int $facilityTypeId, string $name)
    {
        $this->id             = $id;
        $this->type           = $type;
        $this->facilityTypeId = $facilityTypeId;
        $this->name           = $name;
    }

    /**
     * @param array $array
     * @return HotelFacilityType
     */
    public static function fromArray(array $array): HotelFacilityType
    {
        return new self($array['hotel_facility_type_id'], $array['type'], $array['facility_type_id'], $array['name']);
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getFacilityTypeId(): int
    {
        return $this->facilityTypeId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}