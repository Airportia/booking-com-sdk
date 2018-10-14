<?php

namespace BookingCom\Models;

use BookingCom\Models\ChangedHotels\Change;

class ChangedHotels extends AbstractModel
{
    /** @var  array */
    private $closedHotels;

    /** @var  Change[] */
    private $changedHotels;

    /**
     * ChangedHotelsInfo constructor.
     *
     * @param array $closedHotels
     * @param array $changedHotels
     */
    public function __construct(array $closedHotels, array $changedHotels)
    {
        $this->closedHotels  = $closedHotels;
        $this->changedHotels = $changedHotels;
    }

    /**
     * @param array $array
     * @return ChangedHotels
     */
    public static function fromArray(array $array): ChangedHotels
    {
        $changedHotels = self::makeChildrenFromArray($array, Change::class, 'changed_hotels');
        return new self($array['closed_hotels'], $changedHotels);
    }

    /**
     * @return array
     */
    public function getClosedHotels(): array
    {
        return $this->closedHotels;
    }

    /**
     * @return Change[]
     */
    public function getChangedHotels(): array
    {
        return $this->changedHotels;
    }
}
