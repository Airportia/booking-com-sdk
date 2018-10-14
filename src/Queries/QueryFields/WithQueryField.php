<?php

namespace BookingCom\Queries\QueryFields;

class WithQueryField extends AbstractQueryField
{
    /** @var array */
    private $values;

    /**
     * WithQueryField constructor.
     *
     * @param string            $fieldName
     * @param array             $values
     */
    public function __construct(string $fieldName, array $values)
    {
        $this->values = $values;
        $this->fieldName = $fieldName;
    }

    /**
     * @param array  $value
     * @param string $methodName
     */
    public function setValue(string $methodName, $value = null): void
    {
        $val = $this->unCamelize($methodName);
        $this->value[] = $val;
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
        $values = $this->getValues();
        $camelized = [];
        foreach ($values as $value) {
            $camelizedValue = $this->camelize($value);
            $camelized[] = "with{$camelizedValue}";
        }

        return $camelized;
    }

    private function unCamelize(string $method): string
    {
        $array = preg_split('#([A-Z][^A-Z]*)#', $method, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
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

    public static function make(array $params): AbstractQueryField
    {
        return new self($params['fieldName'], $params['values']);
    }
}
