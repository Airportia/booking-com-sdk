<?php

namespace BookingCom\Queries\Operations;


class Where extends OperationObject
{

    /**
     * @param string $method
     * @param array  $allowedProperties
     * @return bool
     */
    public function getProperty(string $method, array $allowedProperties): string
    {
        $propertyName   = substr($method, 5);
        $propertyName   = lcfirst($propertyName);

        if ( ! strpos($method, 'where') === 0 || ! \in_array($propertyName, $allowedProperties, true)) {
            trigger_error('Call to undefined method '.__CLASS__.'::'.$method.'()', E_USER_ERROR);
        }

        return $propertyName;
    }

    /**
     * @param        $values
     * @param string $resultType
     * @return mixed
     */
    public function getValues($values, string $resultType)
    {
        return $this->getResult($values, $resultType);
    }


}