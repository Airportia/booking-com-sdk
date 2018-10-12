<?php

namespace BookingCom\Models\Payment;

use BookingCom\Models\AbstractModel;

class PaymentType extends AbstractModel
{
    /** @var integer */
    private $id;

    /** @var  boolean */
    private $bookable;

    /** @var  string */
    private $name;

    /**
     * Payment constructor.
     *
     * @param int    $id
     * @param bool   $bookable
     * @param string $name
     */
    public function __construct(int $id, bool $bookable, string $name)
    {
        $this->id       = $id;
        $this->bookable = $bookable;
        $this->name     = $name;
    }

    /**
     * @param array $array
     * @return PaymentType
     */
    public static function fromArray(array $array): PaymentType
    {
        return new self($array['payment_id'], $array['bookable'], $array['name']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isBookable(): bool
    {
        return $this->bookable;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
