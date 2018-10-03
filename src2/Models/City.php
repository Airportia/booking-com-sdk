<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom\Models;


class City
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $numberOfHotels;

    /** @var string */
    private $country;

    private $location;

    private $timezone;

    public function __construct(
        int $id,
        string $name,
        int $numberOfHotels,
        string $country,
        ?Location $location,
        ?Timezone $timezone
    ) {

        $this->id = $id;
        $this->name = $name;
        $this->numberOfHotels = $numberOfHotels;
        $this->country = $country;
        $this->location = $location;
        $this->timezone = $timezone;
    }

    public static function fromArray(array $array): City
    {
        $location = isset($array['location']) ? Location::fromArray($array['location']) : null;
        $timezone = isset($array['timezone']) ? Timezone::fromArray($array['timezone']) : null;

        return new self($array['city_id'], $array['name'], $array['nr_hotels'], $array['country'], $location,
            $timezone);
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function getTimezone()
    {
        return $this->timezone;
    }
}