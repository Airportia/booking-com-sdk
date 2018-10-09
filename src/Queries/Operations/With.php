<?php

namespace BookingCom\Queries\Operations;


class With extends OperationObject
{
//    /** @var  string */
//    private $propertyName;
//
//    /**
//     * @param string $method
//     * @param array  $allowedProperties
//     * @return string
//     */
//    public function getProperty(string $method, array $allowedProperties): string
//    {
//        $propertyName = substr($method, 4);
//        $propertyName = lcfirst($propertyName);
//
//        if ( ! strpos($method, 'with') === 0 || ! \in_array($propertyName, $allowedProperties, true)) {
//            trigger_error('Call to undefined method '.__CLASS__.'::'.$method.'()', E_USER_ERROR);
//        }
//
//        $this->propertyName = $propertyName;
//
//        return $propertyName;
//    }
//
//    /**
//     * @param string $resultType
//     * @return mixed
//     */
//    public function getValues(string $resultType)
//    {
//        $value = $this->getPropertyName();
//
//        return $this->getResult($value, $resultType);
//    }
//
//    /**
//     * @return string
//     */
//    public function getPropertyName(): string
//    {
//        return $this->propertyName;
//    }
}