<?php

namespace BookingCom\Models;

use BookingCom\Traits\TranslationsTrait;

class RoomType extends AbstractModel
{
    use TranslationsTrait;

    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * RoomType constructor.
     *
     * @param int    $id
     * @param string $name
     * @param array  $translations
     */
    public function __construct(int $id, string $name, array $translations)
    {
        $this->id = $id;
        $this->name = $name;
        $this->translations = $translations;
    }

    public static function fromArray(array $array): RoomType
    {
        $translations = self::makeChildrenFromArray($array, Translation::class, 'translations');
        return new self($array['room_type_id'], $array['name'], $translations);
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
