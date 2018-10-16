<?php

namespace BookingCom;

use BookingCom\Models\ChainType;
use BookingCom\Models\ChangedHotels;
use BookingCom\Models\City;
use BookingCom\Models\Country;
use BookingCom\Models\District;
use BookingCom\Models\FacilityType;
use BookingCom\Models\Hotel;
use BookingCom\Models\HotelFacilityType;
use BookingCom\Models\HotelThemeType;
use BookingCom\Models\HotelType;
use BookingCom\Models\PaymentType;
use BookingCom\Models\Region;
use BookingCom\Models\RoomFacilityType;
use BookingCom\Models\RoomType;
use BookingCom\Queries\AbstractQuery;
use BookingCom\Queries\ChainTypesQuery;
use BookingCom\Queries\CitiesQuery;
use BookingCom\Queries\CountriesQuery;
use BookingCom\Queries\DistrictsQuery;
use BookingCom\Queries\FacilityTypesQuery;
use BookingCom\Queries\HotelFacilityTypesQuery;
use BookingCom\Queries\HotelsQuery;
use BookingCom\Queries\HotelThemeTypesQuery;
use BookingCom\Queries\HotelTypesQuery;
use BookingCom\Queries\PaymentTypesQuery;
use BookingCom\Queries\RegionsQuery;
use BookingCom\Queries\RoomFacilityTypesQuery;
use BookingCom\Queries\RoomTypesQuery;

class Client
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * Client constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public static function create($config): self
    {
        return new self(new Connection($config));
    }

    /**
     * @param RegionsQuery $query
     * @return Region[]
     */
    public function getRegions(RegionsQuery $query = null): array
    {
        return $this->runQuery('regions', Region::class, $query);
    }

    /**
     * @param CitiesQuery|null $query
     * @return City[]
     */
    public function getCities(CitiesQuery $query = null): array
    {
        return $this->runQuery('cities', City::class, $query);
    }

    /**
     * @param ChainTypesQuery|null $query
     * @return ChainType[]
     */
    public function getChainTypes(ChainTypesQuery $query = null): array
    {
        return $this->runQuery('chainTypes', ChainType::class, $query);
    }

    /**
     * @param Queries\ChangedHotelsQuery $query
     * @return ChangedHotels
     */
    public function getChangedHotelsInfo(Queries\ChangedHotelsQuery $query): ChangedHotels
    {
        return ChangedHotels::fromArray($this->connection->execute('changedHotels', $query->toArray()));
    }

    /**
     * @param CountriesQuery $query
     * @return Country[]
     */
    public function getCountries(CountriesQuery $query = null): array
    {
        return $this->runQuery('countries', Country::class, $query);
    }

    /**
     * @param DistrictsQuery $query
     * @return District[]
     */
    public function getDistricts(DistrictsQuery $query = null): array
    {
        return $this->runQuery('districts', District::class, $query);
    }

    /**
     * @param FacilityTypesQuery $query
     * @return \BookingCom\Models\FacilityType[]
     */
    public function getFacilityTypes(FacilityTypesQuery $query = null): array
    {
        return $this->runQuery('facilityTypes', FacilityType::class, $query);
    }

    /**
     * @param HotelFacilityTypesQuery $query
     * @return \BookingCom\Models\HotelFacilityType[]
     */
    public function getHotelFacilityTypes(HotelFacilityTypesQuery $query = null): array
    {
        return $this->runQuery('hotelFacilityTypes', HotelFacilityType::class, $query);
    }

    /**
     * @param HotelsQuery $query
     * @return Hotel[]
     */
    public function getHotels(HotelsQuery $query = null): array
    {
        return $this->runQuery('hotels', Hotel::class, $query);
    }

    /**
     * @param HotelThemeTypesQuery|null $query
     * @return \BookingCom\Models\HotelThemeType[]
     */
    public function getHotelThemeTypes(HotelThemeTypesQuery $query = null): array
    {
        return $this->runQuery('hotelThemeTypes', HotelThemeType::class, $query);
    }

    /**
     * @param HotelTypesQuery|null $query
     * @return HotelType[]
     */
    public function getHotelTypes(HotelTypesQuery $query = null): array
    {
        return $this->runQuery('hotelTypes', HotelType::class, $query);
    }

    /**
     * @param PaymentTypesQuery|null $query
     * @return \BookingCom\Models\PaymentType[]
     */
    public function getPaymentTypes(PaymentTypesQuery $query = null): array
    {
        return $this->runQuery('paymentTypes', PaymentType::class, $query);
    }

    /**
     * @param RoomFacilityTypesQuery|null $query
     * @return \BookingCom\Models\RoomFacilityType[]
     */
    public function getRoomFacilityTypes(RoomFacilityTypesQuery $query = null): array
    {
        return $this->runQuery('roomFacilityTypes', RoomFacilityType::class, $query);
    }

    /**
     * @param RoomTypesQuery $query
     * @return \BookingCom\Models\RoomType[]
     */
    public function getRoomTypes(RoomTypesQuery $query): array
    {
        return $this->runQuery('roomTypes', RoomType::class, $query);
    }

    /**
     * @param AbstractQuery $query
     * @return array
     */
    private function getQueryParams(AbstractQuery $query = null): array
    {
        return $query === null ? [] : $query->toArray();
    }

    private function runQuery(string $uri, string $targetClass, AbstractQuery $query = null): array
    {
        $params = $this->getQueryParams($query);
        return array_map(function (array $modelArray) use ($targetClass) {
            return \call_user_func([$targetClass, 'fromArray'], $modelArray);
        }, $this->connection->execute($uri, $params));
    }
}
