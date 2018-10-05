<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;

class ChangedHotel extends BookingObject
{
    public const ROOM_PHOTOS_CHANGED = 'room_photos';
    public const ROOM_DESCRIPTION_CHANGED = 'room_description';
    public const HOTEL_PHOTOS_CHANGED = 'hotel_photos';
    public const HOTEL_FACILITIES_CHANGED = 'hotel_facilities';
    public const PAYMENT_TYPES_CHANGED = 'payment_types';
    public const HOTEL_INFO_CHANGED = 'hotel_info';
    public const ROOM_INFO_CHANGED = 'room_info';
    public const HOTEL_DESCRIPTION_CHANGED = 'hotel_description';
    public const ROOM_FACILITIES_CHANGED = 'room_facilities';


    /** @var  integer */
    private $id;

    /** @var  array */
    private $changes;

    public function __construct(int $id, array $changes)
    {
        $this->id      = $id;
        $this->changes = $changes;
    }

    /**
     * @param array $array
     * @return ChangedHotel
     */
    public static function fromArray(array $array): ChangedHotel
    {
        return new self($array['hotel_id'], $array['changes']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getChanges(): array
    {
        return $this->changes;
    }
}