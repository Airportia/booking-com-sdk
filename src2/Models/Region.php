<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom\Models;


class Region
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

    public function __construct(int $id, string $name, string $regionType, string $country)
    {
        $this->name = $name;
        $this->id = $id;
        $this->regionType = $regionType;
        $this->country = $country;
    }

    public static function fromArray(array $array): Region
    {
        return new self($array['region_id'], $array['name'], $array['region_type'], $array['country']);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRegionType(): string
    {
        return $this->regionType;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}