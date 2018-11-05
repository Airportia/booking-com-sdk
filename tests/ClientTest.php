<?php

namespace BookingCom\Tests;

use BookingCom\Client;
use BookingCom\Connection;
use BookingCom\Models\AutocompleteItem;
use BookingCom\Models\ChainType;
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
use BookingCom\Queries\AutocompleteQuery;
use BookingCom\Queries\ChainTypesQuery;
use BookingCom\Queries\ChangedHotelsQuery;
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
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testRegions(): void
    {
        $client = $this->createClient(
            'regions',
            ['rows' => 1],
            '[{"country":"ar","region_type":"other","name":"Capital Federal","region_id":592,"translations":[{"language":"en","name":"Capital Federal"}]}]'
        );

        $regions = $client->getRegions((new RegionsQuery())->setRows(1));
        $this->assertNotEmpty($regions);
        $this->assertContainsOnlyInstancesOf(Region::class, $regions);
    }

    /**
     * @return void
     */
    public function testCities(): void
    {
        $client = $this->createClient(
            'cities',
            ['rows' => 1],
            '[{"city_id":-3881514,"country":"pk","translations":[{"name":"Kary","language":"en"}],"nr_hotels":1,"name":"Kary"}]'
        );

        $models = $client->getCities((new CitiesQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(City::class, $models);
    }

    public function testChainTypes(): void
    {
        $client = $this->createClient('chainTypes', ['rows' => 1], '[{"name":"Campanile","chain_id":1018}]');

        $models = $client->getChainTypes((new ChainTypesQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(ChainType::class, $models);
    }

    public function testChangedHotelsInfo(): void
    {
        $date = new \DateTime();

        $client = $this->createClient(
            'changedHotels',
            ['last_change' => $date->format('Y-m-d H:i:s')],
            '{"closed_hotels": [111, 222, 333], "changed_hotels": [{"hotel_id": 4146774, "changes": ["hotel_photos", "room_description", "room_facilities", "room_photos", "room_info", "hotel_facilities", "hotel_info", "payment_types", "hotel_description"]}]}'
        );

        $model = $client->getChangedHotelsInfo(new ChangedHotelsQuery($date));

        $this->assertEquals(4146774, $model->getChangedHotels()[0]->getId());
    }

    public function testCountries(): void
    {
        $client = $this->createClient(
            'countries',
            ['rows' => 1],
            '[{"country":"ad","translations":[{"language":"en","name":"Andorra","area":"Europe"}],"area":"Europe","name":"Andorra"}]'
        );

        $models = $client->getCountries((new CountriesQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(Country::class, $models);
    }

    public function testDistricts(): void
    {
        $client = $this->createClient(
            'districts',
            ['rows' => 1],
            '[{"country":"fr","nr_hotels":192,"district_id":1,"name":"1st arr.","city_id":-1456928,"translations":[{"name":"1st arr.","language":"en"}]}]'
        );

        $models = $client->getDistricts((new DistrictsQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(District::class, $models);
    }

    public function testFacilityTypes(): void
    {
        $client = $this->createClient(
            'facilityTypes',
            ['facility_type_ids' => 1],
            '[{"translations":[{"name":"General","language":"en"}],"facility_type_id":1,"name":"General"}]'
        );

        $models = $client->getFacilityTypes((new FacilityTypesQuery())->whereFacilityTypeIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(FacilityType::class, $models);
    }

    public function testHotelFacilityTypes(): void
    {
        $client = $this->createClient(
            'hotelFacilityTypes',
            ['facility_type_ids' => 1],
            '[{"type":"boolean","translations":[{"language":"en","name":"Parking"}],"facility_type_id":1,"hotel_facility_type_id":2,"name":"Parking"}]'
        );

        $models = $client->getHotelFacilityTypes((new HotelFacilityTypesQuery())->whereFacilityTypeIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(HotelFacilityType::class, $models);
    }

    public function testHotels(): void
    {
        $client = $this->createClient('hotels', ['chain_ids' => 1], '[{"hotel_id":10004}]');

        $models = $client->getHotels((new HotelsQuery())->whereChainIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(Hotel::class, $models);
    }

    public function testHotelThemeTypes(): void
    {
        $client = $this->createClient('hotelThemeTypes', ['rows' => 1], '[{"name":"Spa/Relax","theme_id":3}]');

        $models = $client->getHotelThemeTypes((new HotelThemeTypesQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(HotelThemeType::class, $models);
    }

    public function testHotelTypes(): void
    {
        $client = $this->createClient(
            'hotelTypes',
            ['rows' => 1],
            '[{"translations":[{"name":"Apartments","language":"en"}],"name":"Apartments","hotel_type_id":201}]'
        );

        $models = $client->getHotelTypes((new HotelTypesQuery())->setRows(1));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(HotelType::class, $models);
    }

    public function testPaymentTypes(): void
    {
        $client = $this->createClient(
            'paymentTypes',
            ['payment_ids' => 1],
            '[{"payment_id":1,"name":"American Express","bookable":true}]'
        );

        $models = $client->getPaymentTypes((new PaymentTypesQuery())->wherePaymentIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(PaymentType::class, $models);
    }

    public function testRoomFacilityTypes(): void
    {
        $client = $this->createClient(
            'roomFacilityTypes',
            ['facility_type_ids' => 1],
            '[{"type":"boolean","room_facility_type_id":1,"name":"Tea/Coffee Maker","facility_type_id":7,"translations":[{"language":"en","name":"Tea/Coffee Maker"}]}]'
        );

        $models = $client->getRoomFacilityTypes((new RoomFacilityTypesQuery())->whereFacilityTypeIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(RoomFacilityType::class, $models);
    }

    public function testRoomTypes(): void
    {
        $client = $this->createClient(
            'roomTypes',
            ['room_type_ids' => 1],
            '[{"translations":[{"language":"en","name":"Apartment"}],"room_type_id":1,"name":"Apartment"}]'
        );

        $models = $client->getRoomTypes((new RoomTypesQuery())->whereRoomTypeIdsIn([1]));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(RoomType::class, $models);
    }

    public function testAutocomplete(): void
    {
        $client = $this->createClient(
            'autocomplete',
            ['text' => 'test', 'language' => 'en'],
            '[{"right-to-left":0,"url":"https://www.booking.com/searchresults.en-gb.html?dest_id=-2140479&dest_type=city&aid=1613783","label":"Amsterdam, Noord-Holland, Netherlands","city_name":"Amsterdam","id":"-2140479","country":"nl","name":"Amsterdam","latitude":"52.3728981018066","language":"en","nr_hotels":2137,"country_name":"Netherlands","longitude":"4.89300012588501","city_ufi":null,"region":"Noord-Holland","type":"city"}]'
        );

        $models = $client->autocomplete(new AutocompleteQuery('test'));

        $this->assertNotEmpty($models);
        $this->assertContainsOnlyInstancesOf(AutocompleteItem::class, $models);

    }


    /**
     * @param string $expectedEndpoint
     * @param        $expectedParams
     * @param string $json
     * @return Client
     */
    private function createClient(string $expectedEndpoint, $expectedParams, string $json): Client
    {
        $connection = $this->createMock(Connection::class);
        $connection->method('execute')->with(
            $this->equalTo($expectedEndpoint),
            $this->equalTo($expectedParams)
        )->willReturn(json_decode($json, true));

        /** @var Connection $connection */
        return new Client($connection);
    }
}
