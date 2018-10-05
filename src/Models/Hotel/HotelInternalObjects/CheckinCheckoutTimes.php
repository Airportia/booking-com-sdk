<?php

namespace BookingCom\Models\Hotel\HotelInternalObjects;

use BookingCom\BookingObject;

class CheckinCheckoutTimes extends BookingObject
{
    public const UNIT_TO = 'to';
    public const UNIT_FROM = 'from';

    /** @var  string */
    private $checkoutTo;

    /** @var  string */
    private $checkoutFrom;

    /** @var  string */
    private $checkinTo;

    /** @var  string */
    private $checkinFrom;

    /**
     * CheckinCheckoutTimes constructor.
     *
     * @param string $checkoutTo
     * @param string $checkoutFrom
     * @param string $checkinTo
     * @param string $checkinFrom
     */
    public function __construct(string $checkoutTo, string $checkoutFrom, string $checkinTo, string $checkinFrom)
    {
        $this->checkoutTo   = $checkoutTo;
        $this->checkoutFrom = $checkoutFrom;
        $this->checkinTo    = $checkinTo;
        $this->checkinFrom  = $checkinFrom;
    }

    /**
     * @param array $array
     * @return CheckinCheckoutTimes
     */
    public static function fromArray(array $array): CheckinCheckoutTimes
    {
        return new self($array['checkout_to'], $array['checkout_from'], $array['checkin_to'], $array['checkin_from']);
    }

    /**
     * @param string $unit
     * @return string
     */
    public function getCheckout(string $unit = self::UNIT_TO): string
    {
        return $unit === self::UNIT_TO ? $this->checkoutTo : $this->checkoutFrom;
    }

    /**
     * @param string $unit
     * @return string
     */
    public function getCheckin(string $unit = self::UNIT_TO): string
    {
        return $unit === self::UNIT_TO ? $this->checkinTo : $this->checkinFrom;
    }
}