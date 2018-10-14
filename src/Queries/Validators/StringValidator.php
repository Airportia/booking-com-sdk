<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class StringValidator extends ValidatorObject
{
    public function assertValues($values): void
    {
        Assert::allString($values);
    }
}
