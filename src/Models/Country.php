<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

/**
 * Class Country
 * @package BookingCom\Models
 * @method Country\Translation getTranslation($language)
 */
class Country extends AbstractModel
{
    use TranslationsTrait;

    /** @var  string */
    private $name;

    /** @var  string */
    private $country;

    /** @var  string */
    private $area;

    public function __construct(string $name, string $country, string $area, array $translations)
    {
        $this->name = $name;
        $this->country = $country;
        $this->area = $area;
        $this->translations = $translations;
    }

    public static function fromArray(array $array): Country
    {
        $translations = self::makeChildrenFromArray($array, Country\Translation::class, 'translations');
        return new self($array['name'], $array['country'], $array['area'], $translations);
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
