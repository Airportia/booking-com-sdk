<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\AbstractQueryField;
use BookingCom\Queries\Validators\AbstractValidator;

abstract class AbstractQuery
{
    /** @var  array */
    private $fields;

    public function __construct()
    {
        $this->fields = $this->makeFields();
    }

    /**
     * @return array
     */
    abstract protected function fields(): array;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this->fields as $field) {
            if (($value = $field->getValue()) !== null) {
                $result[$field->getName()] = $value;
            }
        }

        return $result;
    }

    /**
     * @param $method
     * @param $arguments
     * @return AbstractQuery
     */
    public function __call($method, $arguments): self
    {
        foreach ($this->fields as $field) {
            if ($field->matchMethod($method)) {
                $field->setValue($method, $arguments[0] ?? null);
            }
        }

        return $this;
    }


    /**
     * @return AbstractQueryField[]
     */
    private function makeFields(): array
    {
        $fields = [];
        foreach ($this->fields() as $fieldName => $fieldConfig) {
            /** @var AbstractQueryField $fieldClass */
            $fieldClass = $fieldConfig['operation'][0];
            $fieldParams = $fieldConfig['operation'][1] ?? [];

            /** @var AbstractValidator $validatorClass */
            $validatorClass = $fieldConfig['validator'][0] ?? null;
            $validatorParams = $fieldConfig['validator'][1] ?? [];

            $validator = $validatorClass ? $validatorClass::make($validatorParams) : null;

            if ($validator) {
                $fieldParams['validator'] = $validator;
            }
            $fieldParams['fieldName'] = $fieldName;

            $fields[] = $fieldClass::make($fieldParams);
        }
        return $fields;
    }
}
