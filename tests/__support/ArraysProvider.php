<?php

namespace BookingCom\Tests\__support;


class ArraysProvider
{
    public const REGIONS = 'regions';
    public const CITIES = 'cities';
    public const CHAIN_TYPES = 'chainTypes';
    public const CHANGED_HOTELS = 'changedHotels';
    public const COUNTRIES = 'countries';
    public const DISTRICTS = 'districts';
    public const FACILITY_TYPES = 'facilityTypes';
    public const HOTEL_FACILITY_TYPES = 'hotelFacilityTypes';
    public const HOTELS = 'hotels';
    public const HOTEL_THEME_TYPES = 'hotelThemeTypes';
    public const HOTEL_TYPES = 'hotelTypes';
    public const PAYMENT_TYPES = 'paymentTypes';
    public const ROOM_FACILITY_TYPES = 'roomFacilityTypes';
    public const ROOM_TYPES = 'roomTypes';

    public static function getItems(string $type): array
    {
        $data = json_decode(file_get_contents(__DIR__."/responses/$type.json"), true);
        if ($type === self::CHANGED_HOTELS) {
            return [$data['result']];
        }

        return array_map(function ($array) {
            return [$array];
        }, $data['result']);
    }
}