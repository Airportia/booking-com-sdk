<?php

namespace BookingCom;


use BookingCom\Queries\Validators\ValidatorObject;

abstract class QueryObject
{
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
            if (($value = $rule->getValue()) !== null) {
                $result[$rule->getFieldName()] = $value;
            }
        }

        return $result;
    }

    /**
     * @param $method
     * @param $arguments
     * @return QueryObject
     */
    public function __call($method, $arguments): self
    {
        $rules = $this->getRules();
        foreach ($rules as $rule) {
            if ($rule->matchMethod($method)) {
                $rule->setValue($arguments[0] ?? null);
            }
        }

        return $this;
    }


    /**
     * @return ConditionObject[]|null
     */
    private function getRules(): ? array
    {
        if ($this->rules === null) {
            $this->rules = [];
            foreach ($this->rules() as $field => $ruleArray) {
                if (isset($ruleArray['validator'])) {
                    /** @var ValidatorObject $validator */
                    $validator = new $ruleArray['validator'][0]($ruleArray['validator'][1]['values'] ?? null);
                } else {
                    $validator = null;
                }
                $this->rules[] = new $ruleArray['operation'][0]($field, $validator, $ruleArray['operation'][1]['values'] ?? null);
            }
        }

        return $this->rules;
    }
}