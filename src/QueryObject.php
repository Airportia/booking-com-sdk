<?php

namespace BookingCom;

use BookingCom\Queries\Rule;

abstract class QueryObject
{
    public const ASSERT_ID = 'all_integer';
    public const ASSERT_ONE_OF = 'one_of';
    public const ASSERT_COUNTRY = 'all_length';

    public const RESULT_IMPLODE = 'implode';
    public const RESULT_STRING = 'string';

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
            if ($rule->getValues() !== null) {
                $operation                 = $rule->getOperation();
                $result[$rule->getField()] = $operation->getResultValues($rule->getValues(), $rule->getResultType());
            }
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
                $rule->callMethod($arguments[0] ?? null);
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
            foreach ($rule['method_names'] as $item) {
                $methods[] = $item;
            }
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
                $operation = new $ruleArray['operation']();
                if (isset($ruleArray['validator'])) {
                    $validator = new $ruleArray['validator'][0]($ruleArray['validator'][1]['values'] ?? null);
                } else {
                    $validator = null;
                }
                $this->rules[] = new Rule($field, $operation, $validator, $ruleArray['result_type'], $ruleArray['method_names']);
            }
        }

        return $this->rules;
    }
}