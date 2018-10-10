<?php

namespace BookingCom\Queries\Operations;


use BookingCom\QueryObject;

abstract class OperationObject
{
    /** @var  string */
    protected $resultType;

    /** @var  string */
    protected $propertyName;

    /** @var  string */
    protected $method;

//    /**
//     * @param string $method
//     * @return string
//     */
//    abstract public function getProperty(string $method): string;

    /**
     * @param array $allowedMethods
     * @return bool
     */
    abstract public function matchMethod(array $allowedMethods): bool;

    /**
     * @param        $values
     * @param string $resultType
     * @return mixed
     */
    public function getResultValues($values, string $resultType)
    {
        return $this->getResult($values, $resultType);
    }

    protected function getResult($values, string $resultType): string
    {
        $result = '';
        switch ($resultType) {
            case ($resultType === QueryObject::RESULT_IMPLODE):
                $result = implode(',', $values);
                break;

            case ($resultType === QueryObject::RESULT_STRING):
                $result = $values[0];
                break;
        }

        return $result;
    }


    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}