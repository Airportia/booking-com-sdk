<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Models;


use BookingCom\BookingObject;

class AutoTag extends BookingObject
{
    private $id;
    private $name;


    /**
     * AutoTag constructor.
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromArray(array $array): self
    {
        return new self($array['tag_id'], $array['tag_name']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}