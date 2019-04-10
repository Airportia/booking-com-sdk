<?php

namespace BookingCom\Models;

use BookingCom\Models\Hotel\Description;
use BookingCom\Models\Hotel\Facility;
use BookingCom\Models\Hotel\Info;
use BookingCom\Models\Hotel\PaymentDetail;
use BookingCom\Models\Hotel\Photo;
use BookingCom\Models\Hotel\Policy;
use BookingCom\Models\Hotel\Room;

class Hotel extends AbstractModel
{
    /** @var  integer */
    private $id;

    /**
     * @var Info|null
     */
    private $info;

    /**
     * @var Photo[]
     */
    private $photos;

    /**
     * @var \BookingCom\Models\Hotel\Room[]
     */
    private $rooms;

    /**
     * @var PaymentDetail[]
     */
    private $paymentDetails;

    /**
     * @var Description|null
     */
    private $description;

    /**
     * @var array
     */
    private $policies;

    /**
     * @var array
     */
    private $facilities;

    /**
     * Hotel constructor.
     *
     * @param int              $id
     * @param Info|null        $info
     * @param Description|null $description
     * @param Photo[]          $photos
     * @param array            $rooms
     * @param array            $paymentDetails
     * @param array            $policies
     * @param array            $facilities
     */
    public function __construct(
        int $id,
        ?Info $info,
        ?Description $description,
        array $photos,
        array $rooms,
        array $paymentDetails,
        array $policies,
        array $facilities
    ) {
        $this->id             = $id;
        $this->info           = $info;
        $this->photos         = $photos;
        $this->rooms          = $rooms;
        $this->paymentDetails = $paymentDetails;
        $this->description    = $description;
        $this->policies       = $policies;
        $this->facilities     = $facilities;
    }

    public static function fromArray(array $array): Hotel
    {
        $hotelData      = $array['hotel_data'] ?? [];
        $info           = isset($hotelData['name']) ? Info::fromArray($hotelData) : null;
        $description    = isset($hotelData['hotel_description']) ? Description::fromArray($hotelData) : null;
        $rooms          = self::makeChildrenFromArray($array, Room::class, 'room_data');
        $photos         = self::makeChildrenFromArray($hotelData, Photo::class, 'hotel_photos');
        $paymentDetails = self::makeChildrenFromArray($hotelData, PaymentDetail::class, 'payment_details');
        $policies       = self::makeChildrenFromArray($hotelData, Policy::class, 'hotel_policies');
        $facilities     = self::makeChildrenFromArray($hotelData, Facility::class, 'hotel_facilities');

        return new self($array['hotel_id'], $info, $description, $photos, $rooms, $paymentDetails, $policies, $facilities);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Info|null
     */
    public function getInfo(): ?Info
    {
        return $this->info;
    }

    /**
     * @return Photo[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @return \BookingCom\Models\Hotel\Room[]
     */
    public function getRooms(): array
    {
        return $this->rooms;
    }

    /**
     * @return PaymentDetail[]
     */
    public function getPaymentDetails(): array
    {
        return $this->paymentDetails;
    }

    /**
     * @return Description|null
     */
    public function getDescription(): ? Description
    {
        return $this->description;
    }

    /**
     * @return Policy[]
     */
    public function getPolicies(): array
    {
        return $this->policies;
    }

    /**
     * @return Facility[]
     */
    public function getFacilities(): array
    {
        return $this->facilities;
    }
}
