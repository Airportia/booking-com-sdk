<?php

namespace BookingCom\Queries\Validators;

use Webmozart\Assert\Assert;

class StringValidator extends AbstractValidator
{
    /**
     * @var int
     */
    private $length;

    public function __construct(int $length = null)
    {
        $this->length = $length;
    }

    public function assertValue($value): void
    {
        Assert::string($value);
        if ($this->length !== null) {
            Assert::length($value, $this->length);
        }
    }

    public static function make(array $params): AbstractValidator
    {
        $length = $params['length'] ?? null;
        return new self($length);
    }
}
