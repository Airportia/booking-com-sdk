<?php

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;

class PaymentDetail extends AbstractModel
{
    /**
     * @var int
     */
    private $paymentId;
    /**
     * @var bool
     */
    private $isBookable;
    /**
     * @var bool
     */
    private $isPayable;
    /**
     * @var bool
     */
    private $isCvcRequired;


    /**
     * PaymentDetail constructor.
     * @param int  $paymentId
     * @param bool $isBookable
     * @param bool $isPayable
     * @param bool $isCvcRequired
     */
    public function __construct(int $paymentId, bool $isBookable, bool $isPayable, bool $isCvcRequired)
    {
        $this->paymentId = $paymentId;
        $this->isBookable = $isBookable;
        $this->isPayable = $isPayable;
        $this->isCvcRequired = $isCvcRequired;
    }

    public static function fromArray(array $array): PaymentDetail
    {
        return new self(
            $array['payment_id'],
            $array['bookable'],
            $array['payable'],
            $array['cvc_required']
        );
    }

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

    /**
     * @return bool
     */
    public function isBookable(): bool
    {
        return $this->isBookable;
    }

    /**
     * @return bool
     */
    public function isPayable(): bool
    {
        return $this->isPayable;
    }

    /**
     * @return bool
     */
    public function isCvcRequired(): bool
    {
        return $this->isCvcRequired;
    }
}
