<?php

namespace BookingCom\Models;

class RoomFacilityType extends AbstractModel
{
    /** @var  string */
    private $name;

    /** @var  integer */
    private $id;

    /** @var  integer */
    private $facilityTypeId;

    /** @var  string */
    private $type;

    /**
     * RoomFacilityType constructor.
     *
     * @param string $name
     * @param int    $id
     * @param int    $facilityTypeId
     * @param string $type
     */
    public function __construct(string $name, int $id, int $facilityTypeId, string $type)
    {
        $this->name           = $name;
        $this->id             = $id;
        $this->facilityTypeId = $facilityTypeId;
        $this->type           = $type;
    }

    /**
     * @param array $array
     * @return RoomFacilityType
     */
    public static function fromArray(array $array): RoomFacilityType
    {
        return new self($array['name'], $array['room_facility_type_id'], $array['facility_type_id'], $array['type']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getType(): string
    {
        return $this->type;
    }
}
