<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class OneOfValidator extends AbstractValidator
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
     * @param $value
     */
    public function assertValue($value): void
    {
        $allowedValues = $this->getAllowedValues();
        Assert::oneOf($value, $allowedValues);
    }

    /**
     * @return array
     */
    private function getAllowedValues(): array
    {
        return $this->allowedValues;
    }

    public static function make(array $params): AbstractValidator
    {
        return new self($params['values']);
    }
}
