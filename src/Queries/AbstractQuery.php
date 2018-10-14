<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\AbstractQueryField;
use BookingCom\Queries\Validators\ValidatorObject;

abstract class AbstractQuery
{
    /** @var  array */
    private $rules;

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
     * @return AbstractQuery
     */
    public function __call($method, $arguments): self
    {
        $rules = $this->getRules();
        foreach ($rules as $rule) {
            if ($rule->matchMethod($method)) {
                $rule->setValue($arguments[0] ?? null, $method);
            }
        }

        return $this;
    }


    /**
     * @return AbstractQueryField[]|null
     */
    private function getRules(): ? array
    {
        if ($this->rules === null) {
            $this->rules = [];
            foreach ($this->fields() as $field => $ruleArray) {
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
