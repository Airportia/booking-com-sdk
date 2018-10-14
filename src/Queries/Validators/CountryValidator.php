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
        Assert::allLength($values, 2);
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
