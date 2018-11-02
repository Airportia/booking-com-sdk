<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class IntegerValidator extends AbstractValidator
{
    /**
     * @param $value
     */
    public function assertValue($value): void
    {
        Assert::integer($value);
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
