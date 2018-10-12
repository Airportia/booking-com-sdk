<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\ValidatorObject;

abstract class AbstractQueryField
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
     * @param        $values
     * @param string $methodName
     */
    abstract public function setValue($values, string $methodName): void;

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
}