<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;
use BookingCom\Models\Location;

class Info extends AbstractModel
{
    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var int
     */
    private $class;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var Times
     */
    private $times;

    /**
     * @var bool
     */
    private $isCreditCardRequired;

    /**
     * @var int
     */
    private $numberOfRooms;

    /**
     * @var \BookingCom\Models\Location
     */
    private $location;

    /**
     * @var int
     */
    private $numberOfReviews;

    /**
     * @var string
     */
    private $deepLinkUrl;

    /**
     * @var int
     */
    private $exactClass;

    /**
     * @var int
     */
    private $hotelTypeId;

    /**
     * @var bool
     */
    private $isBookDomesticWithoutCcDetails;

    /**
     * @var bool
     */
    private $isClosed;

    /**
     * @var string
     */
    private $defaultLanguage;

    /**
     * @var bool
     */
    private $isPreferred;

    /**
     * @var int
     */
    private $maxRoomsInReservation;

    /**
     * @var bool
     */
    private $isClassIsEstimated;

    /**
     * @var array
     */
    private $spokenLanguages;

    /**
     * @var array
     */
    private $themeIds;

    /**
     * @var float|null
     */
    private $reviewScore;

    /**
     * @var int
     */
    private $maxPersonsInReservation;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var int
     */
    private $ranking;

    /**
     * @var int|null
     */
    private $districtId;

    /**
     * @var string
     */
    private $address;

    public function __construct(
        string $currency,
        int $cityId,
        int $class,
        string $url,
        string $zip,
        Times $times,
        bool $isCreditCardRequired,
        int $numberOfRooms,
        Location $location,
        int $numberOfReviews,
        string $deepLinkUrl,
        int $exactClass,
        int $hotelTypeId,
        bool $isBookDomesticWithoutCcDetails,
        bool $isClosed,
        string $defaultLanguage,
        bool $isPreferred,
        int $maxRoomsInReservation,
        bool $isClassIsEstimated,
        array $spokenLanguages,
        array $themeIds,
        ?float $reviewScore,
        int $maxPersonsInReservation,
        string $name,
        string $country,
        string $city,
        int $ranking,
        ?int $districtId,
        string $address
    ) {
        $this->currency = $currency;
        $this->cityId = $cityId;
        $this->class = $class;
        $this->url = $url;
        $this->zip = $zip;
        $this->times = $times;
        $this->isCreditCardRequired = $isCreditCardRequired;
        $this->numberOfRooms = $numberOfRooms;
        $this->location = $location;
        $this->numberOfReviews = $numberOfReviews;
        $this->deepLinkUrl = $deepLinkUrl;
        $this->exactClass = $exactClass;
        $this->hotelTypeId = $hotelTypeId;
        $this->isBookDomesticWithoutCcDetails = $isBookDomesticWithoutCcDetails;
        $this->isClosed = $isClosed;
        $this->defaultLanguage = $defaultLanguage;
        $this->isPreferred = $isPreferred;
        $this->maxRoomsInReservation = $maxRoomsInReservation;
        $this->isClassIsEstimated = $isClassIsEstimated;
        $this->spokenLanguages = $spokenLanguages;
        $this->themeIds = $themeIds;
        $this->reviewScore = $reviewScore;
        $this->maxPersonsInReservation = $maxPersonsInReservation;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
        $this->ranking = $ranking;
        $this->districtId = $districtId;
        $this->address = $address;
    }

    public static function fromArray(array $array)
    {
        $theme_ids = $array['theme_ids'] ?? [];

        return new self(
            $array['currency'],
            $array['city_id'],
            $array['class'],
            $array['url'],
            $array['zip'],
            self::makeChildFromArray($array, Times::class, 'checkin_checkout_times'),
            $array['creditcard_required'],
            $array['number_of_rooms'],
            self::makeChildFromArray($array, Location::class, 'location'),
            $array['number_of_reviews'],
            $array['deep_link_url'],
            $array['exact_class'],
            $array['hotel_type_id'],
            $array['book_domestic_without_cc_details'],
            $array['is_closed'],
            $array['default_language'],
            $array['preferred'],
            $array['max_rooms_in_reservation'],
            $array['class_is_estimated'],
            $array['spoken_languages'],
            $theme_ids,
            $array['review_score'],
            $array['max_persons_in_reservation'],
            $array['name'],
            $array['country'],
            $array['city'],
            $array['ranking'],
            $array['district_id'],
            $array['address']
        );
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @return int
     */
    public function getClass(): int
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @return Times
     */
    public function getTimes(): Times
    {
        return $this->times;
    }

    /**
     * @return bool
     */
    public function isCreditCardRequired(): bool
    {
        return $this->isCreditCardRequired;
    }

    /**
     * @return int
     */
    public function getNumberOfRooms(): int
    {
        return $this->numberOfRooms;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getNumberOfReviews(): int
    {
        return $this->numberOfReviews;
    }

    /**
     * @return string
     */
    public function getDeepLinkUrl(): string
    {
        return $this->deepLinkUrl;
    }

    /**
     * @return int
     */
    public function getExactClass(): int
    {
        return $this->exactClass;
    }

    /**
     * @return int
     */
    public function getHotelTypeId(): int
    {
        return $this->hotelTypeId;
    }

    /**
     * @return bool
     */
    public function isBookDomesticWithoutCcDetails(): bool
    {
        return $this->isBookDomesticWithoutCcDetails;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @return string
     */
    public function getDefaultLanguage(): string
    {
        return $this->defaultLanguage;
    }

    /**
     * @return bool
     */
    public function isPreferred(): bool
    {
        return $this->isPreferred;
    }

    /**
     * @return int
     */
    public function getMaxRoomsInReservation(): int
    {
        return $this->maxRoomsInReservation;
    }

    /**
     * @return bool
     */
    public function isClassIsEstimated(): bool
    {
        return $this->isClassIsEstimated;
    }

    /**
     * @return array
     */
    public function getSpokenLanguages(): array
    {
        return $this->spokenLanguages;
    }

    /**
     * @return array
     */
    public function getThemeIds(): array
    {
        return $this->themeIds;
    }

    /**
     * @return float|null
     */
    public function getReviewScore(): ?float
    {
        return $this->reviewScore;
    }

    /**
     * @return int
     */
    public function getMaxPersonsInReservation(): int
    {
        return $this->maxPersonsInReservation;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function getRanking(): int
    {
        return $this->ranking;
    }

    /**
     * @return int|null
     */
    public function getDistrictId(): ?int
    {
        return $this->districtId;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}
