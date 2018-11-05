<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

class Region extends AbstractModel
{
    use TranslationsTrait;

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

    /** @var string|null */
    private $country;

    /**
     * Region constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $regionType
     * @param string|null $country
     * @param array  $translations
     */
    public function __construct(int $id, string $name, string $regionType, ?string $country, array $translations)
    {
        $this->name = $name;
        $this->id = $id;
        $this->regionType = $regionType;
        $this->country = $country;
        $this->translations = $translations;
    }

    /**
     * @param array $array
     * @return Region
     */
    public static function fromArray(array $array): Region
    {
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');
        return new self($array['region_id'], $array['name'], $array['region_type'], $array['country'], $translations);
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
     * @return string|null
     */
    public function getCountry():? string
    {
        return $this->country;
    }
}
