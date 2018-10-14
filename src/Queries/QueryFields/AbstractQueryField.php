<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\AbstractValidator;

abstract class AbstractQueryField
{
    /**
     * @var AbstractValidator
     */
    protected $validator;

    /**
     * @var string
     */
    protected $fieldName;

    /** @var array */
    protected $value;

    /**
     * @return array
     */
    abstract protected function getMethodNames(): array;

    abstract public static function make(array $params): self;

    /**
     * @param        $value
     * @param string $methodName
     */
    abstract public function setValue(string $methodName, $value = null): void;

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
        $words = explode('_', $fieldName);
        $words = array_map('ucfirst', $words);

        return implode('', $words);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->fieldName;
    }
}
