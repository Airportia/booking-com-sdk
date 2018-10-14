<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Models\Hotel\Room;

use BookingCom\Models\AbstractModel;

class Bedroom extends AbstractModel
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;


    /**
     * Bedroom constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function fromArray(array $array): Bedroom
    {
        return new self($array['name'], $array['description']);
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
    public function getDescription(): string
    {
        return $this->description;
    }
}
