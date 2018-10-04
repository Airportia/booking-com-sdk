<?php

namespace BookingCom\Models\City;


use BookingCom\BookingObject;
use BookingCom\Models\Location\Location;

class City extends BookingObject
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $numberOfHotels;

    /** @var string */
    private $country;

    /** @var Location|null */
    private $location;

    /** @var Timezone|null */
    private $timezone;

    /**
     * City constructor.
     *
     * @param int           $id
     * @param string        $name
     * @param int           $numberOfHotels
     * @param string        $country
     * @param Location|null $location
     * @param Timezone|null $timezone
     */
    public function __construct(int $id,
        string $name,
        int $numberOfHotels,
        string $country,
        ?Location $location,
        ?Timezone $timezone)
    {
        $this->id             = $id;
        $this->name           = $name;
        $this->numberOfHotels = $numberOfHotels;
        $this->country        = $country;
        $this->location       = $location;
        $this->timezone       = $timezone;
    }

    /**
     * @param array $array
     * @return City
     */
    public static function fromArray(array $array): City
    {
        $location = isset($array['location'])
            ? Location::fromArray($array['location']) : null;
        $timezone = isset($array['timezone'])
            ? Timezone::fromArray($array['timezone']) : null;

        return new self($array['city_id'], $array['name'], $array['nr_hotels'],
            $array['country'], $location, $timezone);
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

    /**
     * @return int
     */
    public function getNumberOfHotels(): int
    {
        return $this->numberOfHotels;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return Timezone|null
     */
    public function getTimezone(): ?Timezone
    {
        return $this->timezone;
    }
}