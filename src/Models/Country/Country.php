<?php

namespace BookingCom\Models\Country;


class Country
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $country;

    /** @var  string */
    private $area;

    public function __construct(string $name,
        string $country,
        string $area)
    {
        $this->name    = $name;
        $this->country = $country;
        $this->area    = $area;
    }

    public static function fromArray(array $array): Country
    {
        return new self($array['name'], $array['country'], $array['area']);
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
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }
}