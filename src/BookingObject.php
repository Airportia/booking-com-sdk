<?php

namespace BookingCom;


abstract class BookingObject implements BookingObjectInterface
{
    /**
     * @param array  $array
     * @param        $resource
     * @param string $key
     * @return array|null
     */
    protected static function getObjectsArray(array $array,
        $resource,
        string $key): ? array
    {
        return isset($array[$key])
            ? array_map(function (array $internalArray) use
            (
                $resource
            ) {
                return $resource::fromArray($internalArray);
            }, $array[$key]) : null;
    }

    /**
     * @param array $array
     * @return mixed
     */
    abstract public static function fromArray(array $array);
}