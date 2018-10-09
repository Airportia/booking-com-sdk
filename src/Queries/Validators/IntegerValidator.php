<?php

namespace BookingCom\Queries\Validators;


use Webmozart\Assert\Assert;

class IntegerValidator extends ValidatorObject
{
    /**
     * @param $values
     */
    public function assertValues($values): void
    {
        Assert::allInteger($values);
    }

}