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

    /** @var  array */
    private $methodNames;

    public function __construct(
        string $field,
        $operation,
        ? ValidatorObject $validator,
        string $resultType,
        array $methodNames
    )
    {
        $this->field       = $field;
        $this->operation   = $operation;
        $this->validator   = $validator;
        $this->resultType  = $resultType;
        $this->methodNames = $methodNames;
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
        $operation = $this->getOperation();
        $operation->setMethod($method);

        if (\in_array($method, $allowedMethods, true) && !\in_array($method, $this->getMethodNames(), true)) {
            return false;
        }

        $operation->matchMethod($allowedMethods);

        return true;
    }


    /**
     * @param array|null $values
     */
    public function callMethod(? array $values): void
    {
        $validator = $this->getValidator();
        $operation = $this->getOperation();

        if ($validator !== null) {
            $validator->assertValues($values);
        }
        if ($values === null) {
            $this->values[] = $operation->getValue();
        } else {
            $this->values = $values;
        }
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
     * @return ValidatorObject|null
     */
    public function getValidator():? ValidatorObject
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
     * @return array
     */
    public function getMethodNames(): array
    {
        return $this->methodNames;
    }
}