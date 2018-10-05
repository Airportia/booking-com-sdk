<?php

namespace BookingCom\Models\Hotel\HotelInternalObjects;


use BookingCom\BookingObject;

class AlternativeKeyLocationDetails extends BookingObject
{
    /** @var  string */
    private $city;

    /** @var  string */
    private $zip;

    /** @var  string */
    private $address;

    /**
     * AlternativeKeyLocationDetails constructor.
     *
     * @param string $city
     * @param string $zip
     * @param string $address
     */
    public function __construct(string $city, string $zip, string $address)
    {
        $this->city    = $city;
        $this->zip     = $zip;
        $this->address = $address;
    }


    public static function fromArray(array $array): AlternativeKeyLocationDetails
    {
        return new self($array['city'], $array['zip'], $array['address']);
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}