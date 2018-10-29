<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class CountryValidator extends AbstractValidator
{
    /**
     * @param $values
     */
    public function assertValues($values): void
    {
        if (\is_array($values)) {
            Assert::allLength($values, 2);
        } else {
            Assert::length($values, 2);
        }
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
