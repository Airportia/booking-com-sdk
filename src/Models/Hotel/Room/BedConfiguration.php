<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Models\Hotel\Room;

use BookingCom\Models\AbstractModel;

class BedConfiguration extends AbstractModel
{
    private $bedTypes;

    public function __construct(array $bedTypes)
    {
        $this->bedTypes = $bedTypes;
    }

    public static function fromArray(array $array): BedConfiguration
    {
        return new self(self::makeChildrenFromArray($array, BedType::class, 'bed_types'));
    }

    /**
     * @return BedType[]|array
     */
    public function getBedTypes(): array
    {
        return $this->bedTypes;
    }
}
