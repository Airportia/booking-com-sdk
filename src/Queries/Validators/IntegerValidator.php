<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class IntegerValidator extends AbstractValidator
{
    /**
     * @param $values
     */
    public function assertValues($values): void
    {
        if (\is_array($values)) {
            Assert::allInteger($values);
        } else {
            Assert::integer($values);
        }
    }

    public static function make(array $params): AbstractValidator
    {
        return new self();
    }
}
