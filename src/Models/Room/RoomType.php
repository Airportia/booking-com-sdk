<?php

namespace BookingCom\Models\Room;


use BookingCom\BookingObject;

class RoomType extends BookingObject
{
    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * RoomType constructor.
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

    public static function fromArray(array $array): RoomType
    {
        return new self($array['room_type_id'], $array['name']);
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