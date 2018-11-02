<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class StringValidator extends AbstractValidator
{
    public function assertValue($value): void
    {
        Assert::string($value);
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
