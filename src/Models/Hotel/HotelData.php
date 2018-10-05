<?php

namespace BookingCom\Models\Hotel;


use BookingCom\BookingObject;
use BookingCom\Models\Hotel\HotelInternalObjects\CheckinCheckoutTimes;
use BookingCom\Models\Hotel\HotelInternalObjects\KeyCollectionDetails;
use BookingCom\Models\Location\Location;
use BookingCom\Models\Payment\PaymentDetail;

class HotelData extends BookingObject
{
    /** @var  PaymentDetail[]|null */
    private $paymentDetails;

    /** @var  CheckinCheckoutTimes|null */
    private $checkinCheckoutTimes;

    /** @var  boolean|null */
    private $classIsEstimated;

    /** @var  HotelPolicy[]|null */
    private $hotelPolicies;

    /** @var  HotelPhoto[]|null */
    private $hotelPhotos;

    /** @var  array|null */
    private $spokenLanguages;

    /** @var  string|null */
    private $zip;

    /** @var  KeyCollectionDetails|null */
    private $keyCollectionInfo;

    /** @var  integer|null */
    private $districtId;

    /** @var  string|null */
    private $deepLinkUrl;

    /** @var  integer|null */
    private $maxRoomsInReservation;

    /** @var  string|null */
    private $url;

    /** @var  integer|null */
    private $class;

    /** @var  string|null */
    private $licenseNumber;

    /** @var  string|null */
    private $hotelImportantInformation;

    /** @var  HotelFacility[]|null */
    private $hotelFacilities;

    /** @var  float|null */
    private $exactClass;

    /** @var  boolean|null */
    private $closed;

    /** @var  boolean|null */
    private $creditCardRequired;

    /** @var  string|null */
    private $hotelDescription;

    /** @var  array|null */
    private $chainIds;

    /** @var  integer|null */
    private $numberOfReviews;

    /** @var  boolean|null */
    private $bookDomesticWithoutCCDetails;

    /** @var  string|null */
    private $currency;

    /** @var  string|null */
    private $city;

    /** @var  string|null */
    private $country;

    /** @var  string|null */
    private $hotelierWelcomeMessage;

    /** @var  boolean|null */
    private $preferred;

    /** @var  integer|null */
    private $maxPersonsInReservation;

    /** @var  integer|null */
    private $cityId;

    /** @var  integer|null */
    private $hotelTypeId;

    /** @var  integer|null */
    private $numberOfRooms;

    /** @var  string|null */
    private $address;

    /** @var  Location|null */
    private $location;

    /** @var  string|null */
    private $defaultLanguage;

    /** @var  float|null */
    private $reviewScore;

    /** @var  array|null */
    private $themeIds;

    /** @var  integer|null */
    private $ranking;

    /**
     * HotelData constructor.
     *
     * @param PaymentDetail[]|null      $paymentDetails
     * @param CheckinCheckoutTimes|null $checkinCheckoutTimes
     * @param bool|null                 $classIsEstimated
     * @param HotelPolicy[]|null        $hotelPolicies
     * @param HotelPhoto[]|null         $hotelPhotos
     * @param array|null                $spokenLanguages
     * @param null|string               $zip
     * @param KeyCollectionDetails|null $keyCollectionInfo
     * @param int|null                  $districtId
     * @param null|string               $deepLinkUrl
     * @param int|null                  $maxRoomsInReservation
     * @param null|string               $url
     * @param int|null                  $class
     * @param null|string               $licenseNumber
     * @param null|string               $hotelImportantInformation
     * @param HotelFacility[]|null      $hotelFacilities
     * @param float|null                $exactClass
     * @param bool|null                 $closed
     * @param bool|null                 $creditCardRequired
     * @param null|string               $hotelDescription
     * @param array|null                $chainIds
     * @param int|null                  $numberOfReviews
     * @param bool|null                 $bookDomesticWithoutCCDetails
     * @param null|string               $currency
     * @param null|string               $city
     * @param null|string               $country
     * @param null|string               $hotelierWelcomeMessage
     * @param bool|null                 $preferred
     * @param int|null                  $maxPersonsInReservation
     * @param int|null                  $cityId
     * @param int|null                  $hotelTypeId
     * @param int|null                  $numberOfRooms
     * @param null|string               $address
     * @param Location|null             $location
     * @param null|string               $defaultLanguage
     * @param float|null                $reviewScore
     * @param array|null                $themeIds
     * @param int|null                  $ranking
     */
    public function __construct(? array $paymentDetails, ? CheckinCheckoutTimes $checkinCheckoutTimes, ? bool $classIsEstimated, ? array $hotelPolicies, ? array $hotelPhotos,
        ? array $spokenLanguages, ? string $zip, ? KeyCollectionDetails $keyCollectionInfo, ? int $districtId, ? string $deepLinkUrl, ? int $maxRoomsInReservation, ? string $url,
        ? int $class, ? string $licenseNumber, ? string $hotelImportantInformation, ? array $hotelFacilities, ? float $exactClass, ? bool $closed, ? bool $creditCardRequired,
        ? string $hotelDescription, ? array $chainIds, ? int $numberOfReviews, ? bool $bookDomesticWithoutCCDetails, ? string $currency, ? string $city, ? string $country,
        ? string $hotelierWelcomeMessage, ? bool $preferred, ? int $maxPersonsInReservation, ? int $cityId, ? int $hotelTypeId, ? int $numberOfRooms, ? string $address,
        ? Location $location, ? string $defaultLanguage, ? float $reviewScore, ? array $themeIds, ? int $ranking)
    {
        $this->paymentDetails               = $paymentDetails;
        $this->checkinCheckoutTimes         = $checkinCheckoutTimes;
        $this->classIsEstimated             = $classIsEstimated;
        $this->hotelPolicies                = $hotelPolicies;
        $this->hotelPhotos                  = $hotelPhotos;
        $this->spokenLanguages              = $spokenLanguages;
        $this->zip                          = $zip;
        $this->keyCollectionInfo            = $keyCollectionInfo;
        $this->districtId                   = $districtId;
        $this->deepLinkUrl                  = $deepLinkUrl;
        $this->maxRoomsInReservation        = $maxRoomsInReservation;
        $this->url                          = $url;
        $this->class                        = $class;
        $this->licenseNumber                = $licenseNumber;
        $this->hotelImportantInformation    = $hotelImportantInformation;
        $this->hotelFacilities              = $hotelFacilities;
        $this->exactClass                   = $exactClass;
        $this->closed                       = $closed;
        $this->creditCardRequired           = $creditCardRequired;
        $this->hotelDescription             = $hotelDescription;
        $this->chainIds                     = $chainIds;
        $this->numberOfReviews              = $numberOfReviews;
        $this->bookDomesticWithoutCCDetails = $bookDomesticWithoutCCDetails;
        $this->currency                     = $currency;
        $this->city                         = $city;
        $this->country                      = $country;
        $this->hotelierWelcomeMessage       = $hotelierWelcomeMessage;
        $this->preferred                    = $preferred;
        $this->maxPersonsInReservation      = $maxPersonsInReservation;
        $this->cityId                       = $cityId;
        $this->hotelTypeId                  = $hotelTypeId;
        $this->numberOfRooms                = $numberOfRooms;
        $this->address                      = $address;
        $this->location                     = $location;
        $this->defaultLanguage              = $defaultLanguage;
        $this->reviewScore                  = $reviewScore;
        $this->themeIds                     = $themeIds;
        $this->ranking                      = $ranking;
    }

    public static function fromArray(array $array): HotelData
    {
        $paymentDetails               = self::makeChildrenFromArray($array, PaymentDetail::class, 'payment_details', self::CHILDREN_ARRAY);
        $checkinCheckoutTimes         = self::makeChildrenFromArray($array, CheckinCheckoutTimes::class, 'checkin_checkout_times', self::SINGLE_CHILD);
        $classIsEstimated             = $array['class_is_estimated'] ?? null;
        $hotelPolicies                = self::makeChildrenFromArray($array, HotelPolicy::class, 'hotel_policies', self::CHILDREN_ARRAY);
        $hotelPhotos                  = self::makeChildrenFromArray($array, HotelPhoto::class, 'hotel_photo', self::SINGLE_CHILD);
        $spokenLanguages              = $array['spoken_languages'] ?? null;
        $zip                          = $array['zip'] ?? null;
        $keyCollectionInfo            = self::makeChildrenFromArray($array, KeyCollectionDetails::class, 'key_collection_info', self::SINGLE_CHILD);
        $districtId                   = $array['district_id'] ?? null;
        $deepLinkUrl                  = $array['deep_link_url'] ?? null;
        $maxRoomsInReservation        = $array['max_rooms_in_reservation'] ?? null;
        $url                          = $array['url'] ?? null;
        $class                        = $array['class'] ?? null;
        $licenseNumber                = $array['license_number'] ?? null;
        $hotelImportantInformation    = $array['hotel_important_information'] ?? null;
        $hotelFacilities              = self::makeChildrenFromArray($array, HotelFacility::class, 'hotel_facilities', self::CHILDREN_ARRAY);
        $exactClass                   = $array['exactClass'] ?? null;
        $closed                       = $array['closed'] ?? null;
        $creditCardRequired           = $array['credit_card_required'] ?? null;
        $hotelDescription             = $array['hotel_description'] ?? null;
        $chainIds                     = $array['chain_id'] ?? null;
        $numberOfReviews              = $array['number_of_reviews'] ?? null;
        $bookDomesticWithoutCCDetails = $array['book_domestic_without_cc_details'] ?? null;
        $currency                     = $array['currency'] ?? null;
        $city                         = $array['city'] ?? null;
        $country                      = $array['country'] ?? null;
        $hotelierWelcomeMessage       = $array['hotelierWelcomeMessage'] ?? null;
        $preferred                    = $array['preferred'] ?? null;
        $maxPersonsInReservation      = $array['max_rooms_in_reservation'] ?? null;
        $cityId                       = $array['city_id'] ?? null;
        $hotelTypeId                  = $array['hotel_type_id'] ?? null;
        $numberOfRooms                = $array['number_of_rooms'] ?? null;
        $address                      = $array['address'] ?? null;
        $location                     = $array['location'] ?? null;
        $defaultLanguage              = $array['default_language'] ?? null;
        $reviewScore                  = $array['review_score'] ?? null;
        $themeIds                     = $array['themeIds'] ?? null;
        $ranking                      = $array['ranking'] ?? null;

        return new self($paymentDetails, $checkinCheckoutTimes, $classIsEstimated, $hotelPolicies, $hotelPhotos, $spokenLanguages, $zip, $keyCollectionInfo, $districtId,
            $deepLinkUrl, $maxRoomsInReservation, $url, $class, $licenseNumber, $hotelImportantInformation, $hotelFacilities, $exactClass, $closed, $creditCardRequired,
            $hotelDescription, $chainIds, $numberOfReviews, $bookDomesticWithoutCCDetails, $currency, $city, $country, $hotelierWelcomeMessage, $preferred,
            $maxPersonsInReservation, $cityId, $hotelTypeId, $numberOfRooms, $address, $location, $defaultLanguage, $reviewScore, $themeIds, $ranking);
    }

    /**
     * @return PaymentDetail[]|null
     */
    public function getPaymentDetails(): ? array
    {
        return $this->paymentDetails;
    }

    /**
     * @return CheckinCheckoutTimes|null
     */
    public function getCheckinCheckoutTimes(): ? CheckinCheckoutTimes
    {
        return $this->checkinCheckoutTimes;
    }

    /**
     * @return bool|null
     */
    public function getClassIsEstimated(): ? bool
    {
        return $this->classIsEstimated;
    }

    /**
     * @return HotelPolicy[]|null
     */
    public function getHotelPolicies(): ? array
    {
        return $this->hotelPolicies;
    }

    /**
     * @return HotelPhoto[]|null
     */
    public function getHotelPhotos(): ? array
    {
        return $this->hotelPhotos;
    }

    /**
     * @return array|null
     */
    public function getSpokenLanguages(): ? array
    {
        return $this->spokenLanguages;
    }

    /**
     * @return null|string
     */
    public function getZip(): ? string
    {
        return $this->zip;
    }

    /**
     * @return KeyCollectionDetails|null
     */
    public function getKeyCollectionInfo(): ? KeyCollectionDetails
    {
        return $this->keyCollectionInfo;
    }

    /**
     * @return int|null
     */
    public function getDistrictId(): ? int
    {
        return $this->districtId;
    }

    /**
     * @return null|string
     */
    public function getDeepLinkUrl(): ? string
    {
        return $this->deepLinkUrl;
    }

    /**
     * @return int|null
     */
    public function getMaxRoomsInReservation(): ? int
    {
        return $this->maxRoomsInReservation;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ? string
    {
        return $this->url;
    }

    /**
     * @return int|null
     */
    public function getClass(): ? int
    {
        return $this->class;
    }

    /**
     * @return null|string
     */
    public function getLicenseNumber(): ? string
    {
        return $this->licenseNumber;
    }

    /**
     * @return null|string
     */
    public function getHotelImportantInformation(): ? string
    {
        return $this->hotelImportantInformation;
    }

    /**
     * @return HotelFacility[]|null
     */
    public function getHotelFacilities(): ? array
    {
        return $this->hotelFacilities;
    }

    /**
     * @return float|null
     */
    public function getExactClass(): ? float
    {
        return $this->exactClass;
    }

    /**
     * @return bool|null
     */
    public function isClosed(): ? bool
    {
        return $this->closed;
    }

    /**
     * @return bool|null
     */
    public function getCreditCardRequired(): ? bool
    {
        return $this->creditCardRequired;
    }

    /**
     * @return null|string
     */
    public function getHotelDescription(): ? string
    {
        return $this->hotelDescription;
    }

    /**
     * @return array|null
     */
    public function getChainIds(): ? array
    {
        return $this->chainIds;
    }

    /**
     * @return int|null
     */
    public function getNumberOfReviews(): ? int
    {
        return $this->numberOfReviews;
    }

    /**
     * @return bool|null
     */
    public function getBookDomesticWithoutCCDetails(): ? bool
    {
        return $this->bookDomesticWithoutCCDetails;
    }

    /**
     * @return null|string
     */
    public function getCurrency(): ? string
    {
        return $this->currency;
    }

    /**
     * @return null|string
     */
    public function getCity(): ? string
    {
        return $this->city;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ? string
    {
        return $this->country;
    }

    /**
     * @return null|string
     */
    public function getHotelierWelcomeMessage(): ? string
    {
        return $this->hotelierWelcomeMessage;
    }

    /**
     * @return bool|null
     */
    public function getPreferred(): ? bool
    {
        return $this->preferred;
    }

    /**
     * @return int|null
     */
    public function getMaxPersonsInReservation(): ? int
    {
        return $this->maxPersonsInReservation;
    }

    /**
     * @return int|null
     */
    public function getCityId(): ? int
    {
        return $this->cityId;
    }

    /**
     * @return int|null
     */
    public function getHotelTypeId(): ? int
    {
        return $this->hotelTypeId;
    }

    /**
     * @return int|null
     */
    public function getNumberOfRooms(): ? int
    {
        return $this->numberOfRooms;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ? string
    {
        return $this->address;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ? Location
    {
        return $this->location;
    }

    /**
     * @return null|string
     */
    public function getDefaultLanguage(): ? string
    {
        return $this->defaultLanguage;
    }

    /**
     * @return float|null
     */
    public function getReviewScore(): ? float
    {
        return $this->reviewScore;
    }

    /**
     * @return array|null
     */
    public function getThemeIds(): ? array
    {
        return $this->themeIds;
    }

    /**
     * @return int|null
     */
    public function getRanking(): ? int
    {
        return $this->ranking;
    }

}