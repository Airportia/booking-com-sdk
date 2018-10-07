<?php

namespace BookingCom\Models\District;

use BookingCom\BookingObject;
use BookingCom\Models\Location;

class District extends BookingObject
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $country;

    /** @var  Location|null */
    private $location;

    /** @var  integer */
    private $cityId;

    /** @var  integer */
    private $id;

    /** @var  integer */
    private $numberOfHotels;

    /**
     * District constructor.
     *
     * @param string                           $name
     * @param string                           $country
     * @param \BookingCom\Models\Location|null $location
     * @param int                              $cityId
     * @param int                              $id
     * @param int                              $numberOfHotels
     */
    public function __construct(
        string $name,
        string $country,
        ?Location $location,
        int $cityId,
        int $id,
        int $numberOfHotels
    ) {
        $this->name = $name;
        $this->country = $country;
        $this->location = $location;
        $this->cityId = $cityId;
        $this->id = $id;
        $this->numberOfHotels = $numberOfHotels;
    }

    /**
     * @param array $array
     * @return District
     */
    public static function fromArray(array $array): District
    {
        $location = self::makeChildFromArray($array, Location::class, 'location');

        return new self(
            $array['name'],
            $array['country'],
            $location,
            $array['city_id'],
            $array['district_id'],
            $array['nr_hotels']
        );
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return \BookingCom\Models\Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
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
    public function getNumberOfHotels(): int
    {
        return $this->numberOfHotels;
    }
}
