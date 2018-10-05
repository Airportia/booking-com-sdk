<?php

namespace BookingCom\Models\Room;


use BookingCom\BookingObject;

class RoomData extends BookingObject
{
    /** @var  RoomFacility[]|null */
    private $roomFacilities;

    /** @var  RoomPhoto[]|null */
    private $roomPhotos;

    /** @var  integer */
    private $id;

    /** @var  RoomInfo|null */
    private $roomInfo;

    /** @var  string */
    private $name;

    /** @var  string|null */
    private $roomDescription;

    /**
     * RoomData constructor.
     *
     * @param RoomFacility[]|null $roomFacilities
     * @param RoomPhoto[]|null    $roomPhotos
     * @param int                 $id
     * @param RoomInfo|null       $roomInfo
     * @param string              $name
     * @param null|string         $roomDescription
     */
    public function __construct(? array $roomFacilities, ? array $roomPhotos, int $id, ? RoomInfo $roomInfo, string $name, ? string $roomDescription)
    {
        $this->roomFacilities  = $roomFacilities;
        $this->roomPhotos      = $roomPhotos;
        $this->id              = $id;
        $this->roomInfo        = $roomInfo;
        $this->name            = $name;
        $this->roomDescription = $roomDescription;
    }

    public static function fromArray(array $array): RoomData
    {
        $roomFacilities = self::makeChildrenFromArray($array, RoomFacility::class, 'room_facilities', self::CHILDREN_ARRAY);

        $roomPhotos = self::makeChildrenFromArray($array, RoomPhoto::class, 'room_photos', self::CHILDREN_ARRAY);

        $roomInfo = self::makeChildrenFromArray($array, RoomInfo::class, 'room_info', self::SINGLE_CHILD);

        $roomDescription = $array['room_description'] ?? null;

        return new self($roomFacilities, $roomPhotos, $array['room_id'], $roomInfo, $array['room_name'], $roomDescription);

    }

    /**
     * @return RoomFacility[]|null
     */
    public function getRoomFacilities(): ?array
    {
        return $this->roomFacilities;
    }

    /**
     * @return RoomPhoto[]|null
     */
    public function getRoomPhotos(): ? array
    {
        return $this->roomPhotos;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return RoomInfo|null
     */
    public function getRoomInfo(): ? RoomInfo
    {
        return $this->roomInfo;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getRoomDescription(): ? string
    {
        return $this->roomDescription;
    }


}