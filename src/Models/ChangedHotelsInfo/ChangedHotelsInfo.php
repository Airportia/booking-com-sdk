<?php

namespace BookingCom\Models\ChangedHotelsInfo;


class ChangedHotelsInfo
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
    public function __construct(array $closedHotels,
        array $changedHotels)
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
        $changedHotels = array_map(function (array $changedHotelsArray) {
            return ChangedHotel::fromArray($changedHotelsArray);
        }, $array['changed_hotels']);

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