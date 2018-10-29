<?php

namespace BookingCom\Models;

use BookingCom\Models\City\Timezone;
use BookingCom\Traits\TranslationsTrait;

class City extends AbstractModel
{
    use TranslationsTrait;

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
     * @param int                              $id
     * @param string                           $name
     * @param int                              $numberOfHotels
     * @param string                           $country
     * @param \BookingCom\Models\Location|null $location
     * @param Timezone|null                    $timezone
     * @param array                            $translations
     */
    public function __construct(
        int $id,
        string $name,
        int $numberOfHotels,
        string $country,
        ?Location $location,
        ?Timezone $timezone,
        array $translations
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->numberOfHotels = $numberOfHotels;
        $this->country = $country;
        $this->location = $location;
        $this->timezone = $timezone;
        $this->translations = $translations;
    }

    /**
     * @param array $array
     * @return City
     */
    public static function fromArray(array $array): City
    {
        $location = self::makeChildFromArray($array, Location::class, 'location');
        $timezone = self::makeChildFromArray($array, Timezone::class, 'timezone');
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');

        return new self(
            $array['city_id'],
            $array['name'],
            $array['nr_hotels'],
            $array['country'],
            $location,
            $timezone,
            $translations
        );
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
