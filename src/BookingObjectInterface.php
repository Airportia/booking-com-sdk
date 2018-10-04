<?php

namespace BookingCom;


interface BookingObjectInterface
{
    /**
     * @param array $array
     * @return mixed
     */
    public static function fromArray(array $array);
}