<?php

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;

class HotelType extends AbstractModel
{
    /** @var  string */
    private $name;

    /** @var  integer */
    private $id;

    /**
     * HotelType constructor.
     *
     * @param string $name
     * @param int    $id
     */
    public function __construct(string $name, int $id)
    {
        $this->name = $name;
        $this->id   = $id;
    }

    public static function fromArray(array $array): HotelType
    {
        return new self($array['name'], $array['hotel_type_id']);
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
