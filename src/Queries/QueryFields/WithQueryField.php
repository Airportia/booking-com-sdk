<?php

namespace BookingCom\Queries\QueryFields;

use BookingCom\Queries\Validators\ValidatorObject;

class WithQueryField extends AbstractQueryField
{
    /** @var array */
    private $values;

    /**
     * WithQueryField constructor.
     *
     * @param string          $fieldName
     * @param ValidatorObject $validator
     * @param array           $values
     */
    public function __construct(string $fieldName, ValidatorObject $validator = null, array $values)
    {
        $this->values    = $values;
        $this->fieldName = $fieldName;
        $this->validator = $validator;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }

    /**
     * @param array  $values
     * @param string $methodName
     */
    public function setValue($values = [], string $methodName): void
    {
        $this->methodName = $methodName;
        $value            = $this->unCamelize($this->getMethodName());
        $this->value[]    = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value ? implode(',', $this->value) : null;
    }

    /**
     * @return array
     */
    protected function getMethodNames(): array
    {
        $values    = $this->getValues();
        $camelized = [];
        foreach ($values as $value) {
            $camelizedValue = $this->camelize($value);
            $camelized[]    = "with{$camelizedValue}";
        }

        return $camelized;
    }

    private function unCamelize(string $method): string
    {
        $array  = preg_split('#([A-Z][^A-Z]*)#', $method, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $sliced = \array_slice($array, 1);
        $sliced = array_map('lcfirst', $sliced);

        return implode('_', $sliced);
    }

    /**
     * @return array
     */
    private function getValues(): array
    {
        return $this->values;
    }
}