<?php

namespace BookingCom\Models\Hotel;

use BookingCom\BookingObject;

class ChangedHotelsInfo extends BookingObject
{
    /** @var  array */
    private $closedHotels;

    /** @var  ChangedHotel[] */
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
     * @return ChangedHotelsInfo
     */
    public static function fromArray(array $array): ChangedHotelsInfo
    {
        $changedHotels = self::makeChildrenFromArray($array, ChangedHotel::class, 'changed_hotels');
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
     * @return ChangedHotel[]
     */
    public function getChangedHotels(): array
    {
        return $this->changedHotels;
    }
}
