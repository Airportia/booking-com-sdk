<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\AbstractValidator;

class WhereInQueryField extends AbstractQueryField
{

    /**
     * InRule constructor.
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
     * @param        $value
     * @param string $methodName
     */
    public function setValue(string $methodName, $value = null): void
    {
        if ($this->validator !== null) {
            $this->validator->assertValues($value);
        }
        $this->value = $value;
    }

    public static function make(array $params): AbstractQueryField
    {
        return new static($params['fieldName'], $params['validator'] ?? null);
    }
}
