<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

class HotelType extends AbstractModel
{
    use TranslationsTrait;

    /** @var  string */
    private $name;

    /** @var  integer */
    private $id;

    /**
     * HotelType constructor.
     *
     * @param string $name
     * @param int    $id
     * @param array  $translations
     */
    public function __construct(string $name, int $id, array $translations)
    {
        $this->name = $name;
        $this->id = $id;
        $this->translations = $translations;
    }

    public static function fromArray(array $array): HotelType
    {
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');
        return new self($array['name'], $array['hotel_type_id'], $translations);
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
}
