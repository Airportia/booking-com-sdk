<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class OneOfValidator extends ValidatorObject
{
    /** @var  array */
    private $allowedValues;

    /**
     * OneOfValidator constructor.
     *
     * @param array $allowedValues
     */
    public function __construct(array $allowedValues)
    {
        $this->allowedValues = $allowedValues;
    }

    /**
     * @param $values
     */
    public function assertValues($values): void
    {
        $allowedValues = $this->getAllowedValues();

        foreach ($values as $value) {
            Assert::oneOf($value, $allowedValues);
        }
    }

    /**
     * @return array
     */
    public function getAllowedValues(): array
    {
        return $this->allowedValues;
    }
}
