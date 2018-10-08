<?php

namespace BookingCom;

use Webmozart\Assert\Assert;

abstract class QueryObject
{
    public const ASSERT_ID = 'all_integer';
    public const ASSERT_ONE_OF = 'one_of';
    public const ASSERT_COUNTRY = 'all_length';

    /** @var array  */
    private $asserts;

    /**
     * @return array
     */
    abstract protected function getAsserts():array;

    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * QueryObject constructor.
     */
    public function __construct()
    {
        $this->asserts = $this->getAsserts();
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments){
        if(strpos($method, 'where') === 0){
            $propertyName = substr($method, 5);
            $propertyName = lcfirst($propertyName);
            if(property_exists($this, $propertyName)){
                array_unshift($arguments, $propertyName);
                return \call_user_func_array([$this, 'where'], $arguments);
            }
        }

        trigger_error('Call to undefined method '.__CLASS__.'::'.$method.'()', E_USER_ERROR);
    }

    /**
     * @param       $field
     * @param       $values
     * @return $this
     */
    protected function where(
        $field,
        $values
    ): self
    {
        $this->assertValue($field, $values);
        $this->{$field} = $values;

        return $this;
    }

    /**
     * @param string $value
     * @param        $queryObject
     */
    protected function addToExtras(
        string $value,
        &$queryObject
    ): void
    {
        if ( ! \in_array($value, $queryObject->extras, true)) {
            $queryObject->extras[] = $value;
        }
    }

    /**
     * @param $field
     * @param $values
     * @internal param array $assertArr
     */
    private function assertValue($field, $values): void
    {
        switch ($this->asserts[$field]['type']) {
            case ($this->asserts[$field]['type'] === self::ASSERT_ID):
                Assert::allInteger($values);
                break;

            case ($this->asserts[$field]['type'] === self::ASSERT_ONE_OF):
                foreach ($values as $item) {
                    Assert::oneOf($item, $this->asserts[$field]['allowed']);
                }
                break;

            case ($this->asserts[$field]['type'] === self::ASSERT_COUNTRY):
                Assert::allLength($values, 2);
                break;
        }
    }
}