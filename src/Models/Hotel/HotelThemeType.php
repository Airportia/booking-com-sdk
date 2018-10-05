<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;

class HotelThemeType extends BookingObject
{
    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /**
     * HotelThemeType constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public static function fromArray(array $array): HotelThemeType
    {
        return new self($array['theme_id'], $array['name']);
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