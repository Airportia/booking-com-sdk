<?php

namespace BookingCom\Queries\Validators;


abstract class ValidatorObject
{
    /**
     * @param $values
     */
    abstract public function assertValues($values): void;
}