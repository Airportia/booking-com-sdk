<?php

namespace BookingCom\Queries\Operations;


use BookingCom\QueryObject;

abstract class OperationObject
{
    /** @var  string */
    protected $resultType;


    /**
     * @param string $method
     * @param array  $allowedProperties
     * @return string
     */
    abstract public function getProperty(string $method, array $allowedProperties): string;

    /**
     * @param        $values
     * @param string $resultType
     * @return mixed
     */
    abstract public function getValues($values, string $resultType);

    protected function getResult($values, string $resultType): string
    {
        $result = '';
        switch ($resultType) {
            case ($resultType === QueryObject::RESULT_IMPLODE):
                $result = implode(',', $values);
                break;
        }

        return $result;
    }
}