<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\ValidatorObject;

class WhereInQueryField extends AbstractQueryField
{

    /**
     * InRule constructor.
     *
     * @param string               $fieldName
     * @param ValidatorObject|null $validator
     */
    public function __construct(string $fieldName, ValidatorObject $validator = null)
    {
        $this->fieldName = $fieldName;
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    protected function getMethodNames(): array
    {
        $camelized = $this->camelize($this->fieldName);

        return ["where{$camelized}In"];
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value ? implode(',', $this->value) : null;
    }

    /**
     * @param        $values
     * @param string $methodName
     */
    public function setValue($values, string $methodName): void
    {
        $this->methodName = $methodName;
        if ($this->validator !== null) {
            $this->validator->assertValues($values);
        }
        $this->value = $values;
    }
}