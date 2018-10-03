<?php

namespace BookingCom\Models\City;


class Location
{

    /** @var string */
    private $latitude;

    /** @var string */
    private $longitude;

    /**
     * Location constructor.
     *
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @param array $array
     * @return Location
     */
    public static function fromArray(array $array): Location
    {
        return new self($array['latitude'], $array['longitude']);
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }
}