<?php

namespace BookingCom\Models\Room;

use BookingCom\BookingObject;

class RoomFacility extends BookingObject
{
    /**
     * @var int
     */
    private $type_id;
    /**
     * @var string
     */
    private $name;


    /**
     * RoomFacility constructor.
     */
    public function __construct(int $type_id, string $name)
    {
        $this->type_id = $type_id;
        $this->name = $name;
    }

    public static function fromArray(array $array): RoomFacility
    {
        return new self($array['room_facility_type_id'], $array['name']);
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
