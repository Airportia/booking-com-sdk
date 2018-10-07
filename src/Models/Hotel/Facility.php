<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;

class Facility extends BookingObject
{
    /** @var  integer */
    private $typeId;

    /** @var  array|null */
    private $attrs;

    /** @var  string */
    private $name;

    /**
     * HotelFacility constructor.
     *
     * @param int        $typeId
     * @param array|null $attrs
     * @param string     $name
     */
    public function __construct(int $typeId, string $name, array $attrs)
    {
        $this->typeId = $typeId;
        $this->attrs = $attrs;
        $this->name = $name;
    }

    public static function fromArray(array $array): Facility
    {
        $attrs = $array['attrs'] ?? [];

        return new self($array['hotel_facility_type_id'], $array['name'], $attrs);
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @return array|null
     */
    public function getAttrs(): ?array
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