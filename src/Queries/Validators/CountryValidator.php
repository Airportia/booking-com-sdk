<?php

namespace BookingCom\Queries\Validators;


use Webmozart\Assert\Assert;

class CountryValidator extends ValidatorObject
{
    /**
     * @param $values
     */
    public function assertValues($values): void
    {
        Assert::allLength($values, 2);
    }
}