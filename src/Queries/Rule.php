<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\OperationObject;
use BookingCom\Queries\Validators\ValidatorObject;

class Rule
{
    /** @var  string */
    private $field;

    /** @var  ValidatorObject|null */
    private $validator;

    /** @var  mixed */
    private $values;

    /** @var  OperationObject */
    private $operation;

    /** @var  string */
    private $resultType;

    /** @var  string */
    private $propertyName;

    public function __construct(
        string $field,
        $operation,
        ? ValidatorObject $validator,
        string $resultType,
        string $propertyName
    )
    {
        $this->field        = $field;
        $this->operation    = $operation;
        $this->validator    = $validator;
        $this->resultType   = $resultType;
        $this->propertyName = $propertyName;
    }

    /**
     * @param string $method
     * @param array  $allowedMethods
     * @return bool
     */
    public function matchMethod(
        string $method,
        array $allowedMethods
    ): bool
    {
        $result       = false;
        $operation    = $this->getOperation();
        $propertyName = $operation->getProperty($method, $allowedMethods);
        if ($propertyName === $this->getPropertyName()) {
            $result = true;
        }

        return $result;
    }


    /**
     * @param array $values
     */
    public function callMethod(array $values): void
    {
        $validator  = $this->getValidator();
        $operation  = $this->getOperation();
        $resultType = $this->getResultType();

        if ($validator !== null) {
            $validator->assertValues($values);
        }
        $result       = $operation->getValues($values, $resultType);
        $this->values = $result;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return OperationObject
     */
    public function getOperation(): OperationObject
    {
        return $this->operation;
    }

    /**
     * @return ValidatorObject
     */
    public function getValidator(): ValidatorObject
    {
        return $this->validator;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function getResultType(): string
    {
        return $this->resultType;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string 
    {
        return $this->propertyName;
    }
}