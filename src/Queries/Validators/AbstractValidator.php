<?php

namespace BookingCom\Queries\Validators;

abstract class AbstractValidator
{
    /**
     * @param mixed $value
     */
    abstract public function assertValue($value): void;

    abstract public static function make(array $params): self;
}
