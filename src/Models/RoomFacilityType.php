<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

class RoomFacilityType extends AbstractModel
{
    use TranslationsTrait;

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
     * @param array  $translations
     */
    public function __construct(string $name, int $id, int $facilityTypeId, string $type, array $translations)
    {
        $this->name = $name;
        $this->id = $id;
        $this->facilityTypeId = $facilityTypeId;
        $this->type = $type;
        $this->translations = $translations;
    }

    /**
     * @param array $array
     * @return RoomFacilityType
     */
    public static function fromArray(array $array): RoomFacilityType
    {
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');
        return new self($array['name'], $array['room_facility_type_id'], $array['facility_type_id'], $array['type'],
            $translations);
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
