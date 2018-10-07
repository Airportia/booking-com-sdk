<?php

namespace BookingCom\Models\Region;

use BookingCom\BookingObject;

class Region extends BookingObject
{
    public const TYPE_ISLAND = 'island';
    public const TYPE_PROVINCE = 'province';
    public const TYPE_FREE_REGION = 'free_region';
    public const TYPE_OTHER = 'other';

    /** @var string */
    private $name;

    /** @var int */
    private $id;

    /** @var string */
    private $regionType;

    /** @var string */
    private $country;

    /**
     * Region constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $regionType
     * @param string $country
     */
    public function __construct(int $id, string $name, string $regionType, string $country)
    {
        $this->name       = $name;
        $this->id         = $id;
        $this->regionType = $regionType;
        $this->country    = $country;
    }

    /**
     * @param array $array
     * @return Region
     */
    public static function fromArray(array $array): Region
    {
        return new self($array['region_id'], $array['name'], $array['region_type'], $array['country']);
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRegionType(): string
    {
        return $this->regionType;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
