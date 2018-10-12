<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;

class Times extends AbstractModel
{
    /**
     * @var null|string
     */
    private $checkInFrom;
    /**
     * @var null|string
     */
    private $checkInTo;
    /**
     * @var null|string
     */
    private $checkOutFrom;
    /**
     * @var null|string
     */
    private $checkOutTo;


    /**
     * Times constructor.
     * @param null|string $checkInFrom
     * @param null|string $checkInTo
     * @param null|string $checkOutFrom
     * @param null|string $checkOutTo
     */
    public function __construct(?string $checkInFrom, ?string $checkInTo, ?string $checkOutFrom, ?string $checkOutTo)
    {
        $this->checkInFrom = $checkInFrom;
        $this->checkInTo = $checkInTo;
        $this->checkOutFrom = $checkOutFrom;
        $this->checkOutTo = $checkOutTo;
    }

    public static function fromArray(array $array)
    {
        $checkInFrom = $array['checkin_from'] ?? null;
        $checkInTo = $array['checkin_to'] ?? null;
        $checkOutFrom = $array['checkout_from'] ?? null;
        $checkOutTo = $array['checkout_to'] ?? null;
        return new self($checkInFrom, $checkInTo, $checkOutFrom, $checkOutTo);
    }

    /**
     * @return null|string
     */
    public function getCheckInFrom(): ?string
    {
        return $this->checkInFrom;
    }

    /**
     * @return null|string
     */
    public function getCheckInTo(): ?string
    {
        return $this->checkInTo;
    }

    /**
     * @return null|string
     */
    public function getCheckOutFrom(): ?string
    {
        return $this->checkOutFrom;
    }

    /**
     * @return null|string
     */
    public function getCheckOutTo(): ?string
    {
        return $this->checkOutTo;
    }
}
