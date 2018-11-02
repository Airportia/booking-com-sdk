<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class CountryValidator extends AbstractValidator
{
    /**
     * @param $value
     */
    public function assertValue($value): void
    {
        Assert::length($value, 2);
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
