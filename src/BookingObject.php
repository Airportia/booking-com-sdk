<?php

namespace BookingCom;


abstract class BookingObject
{
    protected const SINGLE_CHILD = 'single';
    protected const CHILDREN_ARRAY = 'array';

    /**
     * @param array $array
     * @return mixed
     */
    abstract public static function fromArray(array $array);

    /**
     * @param array  $array
     * @param        $className
     * @param string $key
     * @param string $returnObject
     * @return mixed
     */
    protected static function makeChildrenFromArray(array $array, $className, string $key, string $returnObject)
    {
        if ($returnObject === self::CHILDREN_ARRAY) {
            $result = isset($array[$key]) ? array_map(function (array $internalArray) use ($className) {
                return $className::fromArray($internalArray);
            }, $array[$key]) : null;
        } else {
            $result = isset($array[$key]) ? $className::fromArray($array[$key]) : null;
        }

        return $result;
    }
}