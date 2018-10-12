<?php

namespace BookingCom\Models;

abstract class AbstractModel
{
    /**
     * @param array $array
     * @return mixed
     */
    abstract public static function fromArray(array $array);

    /**
     * @param array  $array
     * @param        $className
     * @param string $key
     * @return mixed
     */
    protected static function makeChildrenFromArray(array $array, $className, string $key)
    {
        if (isset($array[$key])) {
            return array_map(function (array $internalArray) use ($className) {
                /** @var AbstractModel $className */
                return $className::fromArray($internalArray);
            }, $array[$key]);
        }
        return [];
    }

    protected static function makeChildFromArray(array $array, string $className, string $key)
    {
        /** @var AbstractModel $className */
        return isset($array[$key]) ? $className::fromArray($array[$key]) : null;
    }
}
