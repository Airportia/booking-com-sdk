<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

class FacilityType extends AbstractModel
{
    use TranslationsTrait;

    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * Facility constructor.
     *
     * @param int    $id
     * @param string $name
     * @param array  $translations
     */
    public function __construct(int $id, string $name, array $translations)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->translations = $translations;
    }

    /**
     * @param array $array
     * @return FacilityType
     */
    public static function fromArray(array $array): FacilityType
    {
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');
        return new self($array['facility_type_id'], $array['name'], $translations);
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
}
