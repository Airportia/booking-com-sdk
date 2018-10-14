<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class StringValidator extends AbstractValidator
{
    public function assertValues($values): void
    {
        Assert::allString($values);
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
