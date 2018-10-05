<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;

class HotelFacility extends BookingObject
{
    /** @var  integer */
    private $hotelFacilityTypeId;

    /** @var  array|null */
    private $attrs;

    /** @var  string */
    private $name;

    /**
     * HotelFacility constructor.
     *
     * @param int        $hotelFacilityTypeId
     * @param array|null $attrs
     * @param string     $name
     */
    public function __construct(int $hotelFacilityTypeId, ? array $attrs, string $name)
    {
        $this->hotelFacilityTypeId = $hotelFacilityTypeId;
        $this->attrs               = $attrs;
        $this->name                = $name;
    }

    public static function fromArray(array $array): HotelFacility
    {
        $attrs = $array['attrs'] ?? null;

        return new self($array['hotel_facility_type_id'], $attrs, $array['name']);
    }

    /**
     * @return int
     */
    public function getHotelFacilityTypeId(): int
    {
        return $this->hotelFacilityTypeId;
    }

    /**
     * @return array|null
     */
    public function getAttrs():? array
    {
        return $this->attrs;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}