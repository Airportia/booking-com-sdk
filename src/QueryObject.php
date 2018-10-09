<?php

namespace BookingCom;

use BookingCom\Queries\Rule;

abstract class QueryObject
{
    public const ASSERT_ID = 'all_integer';
    public const ASSERT_ONE_OF = 'one_of';
    public const ASSERT_COUNTRY = 'all_length';

    public const RESULT_IMPLODE = 'implode';

    /** @var  array */
    private $rules;

    /**
     * @return array
     */
    abstract protected function rules(): array;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this->getRules() as $rule) {
            $result[$rule->getField()] = $rule->getValues();
        }

        return $result;
    }

    /**
     * @param $method
     * @param $arguments
     * @return QueryObject
     */
    public function __call(
        $method,
        $arguments
    ): self
    {
        $rules = $this->getRules();

        foreach ($rules as $rule) {
            if ($rule->matchMethod($method, $this->getMethods())) {
                $rule->callMethod($arguments[0]);
            }
        }

        return $this;

    }

    /**
     * @return array
     */
    protected function getMethods(): array
    {
        $methods = [];
        foreach ($this->rules() as $rule) {
            $methods[] = $rule['property_name'];
        }

        return $methods;
    }

    /**
     * @return Rule[]|null
     */
    private function getRules(): ? array
    {
        if ($this->rules === null) {
            $this->rules = [];
            foreach ($this->rules() as $field => $ruleArray) {
                $operation = new $ruleArray['operation'][0]($ruleArray['operation'][1] ?? null);
                if (isset($ruleArray['validator'])) {
                    $validator = new $ruleArray['validator'][0]($ruleArray['validator'][1]['values'] ?? null);
                } else {
                    $validator = null;
                }
                $this->rules[] = new Rule($field, $operation, $validator, $ruleArray['result_type'], $ruleArray['property_name']);
            }
        }

        return $this->rules;
    }

    /**
     * @param string $value
     */
    protected function addToExtras(string $value): void
    {
        if ( ! \in_array($value, $this->extras, true)) {
            $this->extras[] = $value;
        }
    }
}