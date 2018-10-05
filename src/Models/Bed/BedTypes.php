<?php

namespace BookingCom\Models\Bed;


use BookingCom\BookingObject;

class BedTypes extends BookingObject
{
    /** @var  BedType[] */
    private $bedTypes;

    /**
     * BedTypes constructor.
     *
     * @param BedType[] $bedTypes
     */
    public function __construct(array $bedTypes)
    {
        $this->bedTypes = $bedTypes;
    }

    public static function fromArray(array $array): BedTypes
    {
        $bedTypes = self::makeChildrenFromArray($array, BedType::class, 'bed_types', self::CHILDREN_ARRAY);

        return new self($bedTypes);
    }

    /**
     * @return BedType[]
     */
    public function getBedTypes(): array
    {
        return $this->bedTypes;
    }

}