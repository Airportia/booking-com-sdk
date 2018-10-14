<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\AbstractValidator;

class SetQueryField extends AbstractQueryField
{

    /**
     * SetQueryField constructor.
     *
     * @param string                 $fieldName
     * @param AbstractValidator|null $validator
     */
    public function __construct(string $fieldName, ?AbstractValidator $validator)
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

        return ["set{$camelized}"];
    }

    /**
     * @param mixed  $value
     * @param string $methodName
     */
    public function setValue(string $methodName, $value = null): void
    {
        if ($this->validator !== null) {
            $this->validator->assertValues($value);
        }
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public static function make(array $params): AbstractQueryField
    {
        return new self($params['fieldName'], $params['validator'] ?? null);
    }
}
