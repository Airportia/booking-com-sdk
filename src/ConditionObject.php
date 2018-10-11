<?php

namespace BookingCom;

use BookingCom\Queries\Validators\ValidatorObject;

abstract class ConditionObject
{
    /**
     * @var ValidatorObject
     */
    protected $validator;

    /**
     * @var string
     */
    protected $fieldName;

    /** @var array */
    protected $value;

    /** @var  string */
    protected $methodName;

    /**
     * @return array
     */
    abstract protected function getMethodNames(): array;

    /**
     * @param mixed $values
     */
    abstract public function setValue($values): void;

    /**
     * @return mixed
     */
    abstract public function getValue();

    /**
     * @param string $methodName
     * @return bool
     */
    public function matchMethod(string $methodName): bool
    {
        $this->methodName = $methodName;

        return \in_array($methodName, $this->getMethodNames(), true);
    }

    /**
     * @param string $fieldName
     * @return string
     */
    protected function camelize(string $fieldName): string
    {
        $fieldName = strtolower($fieldName);
        $words     = explode('_', $fieldName);
        $words     = array_map('ucfirst', $words);

        return implode('', $words);
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }
}