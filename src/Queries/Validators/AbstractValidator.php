<?php

namespace BookingCom\Queries\Validators;

abstract class AbstractValidator
{
    /**
     * @param $values
     */
    abstract public function assertValues($values): void;

    abstract public static function make(array $params): self;
}
