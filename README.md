# Booking.com SDK

**The library is in active development. Not ready for production yet.**

This library is just simple wrapper around booking com API (https://developers.booking.com/api/).

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Support](#support)
- [Contributing](#contributing)

## Installation

Download to your project directory, add `README.md`, and commit:

```sh
composer require digitalbrands/booking-com-sdk
```

## Usage

### Initialization

```php

$client = Client::create([
    'login' => 'your_login',
    'password' => 'your_password',
    'timeout' => 5, // Optional
    'v' => '2.2' // Optional
]);
```

### blockAvailability

Not implemented yet

### hotelAvailability

Not implemented yet

### autocomplete

```php
$models = $client->autocomplete(new AutocompleteQuery('test'));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}
```

### chainTypes

```php
$models = $client->getChainTypes((new ChainTypesQuery());

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}
```

### changedHotels

```php
$sinceDate=new \DateTime();
$model = $client->getChangedHotelsInfo(new ChangedHotelsQuery($sinceDate));

//Closed hotels
$model->getClosedHotels();

//Changed hotels
$model->getChangedHotels();

```

### cities

```php
$models = $client->getCities((new CitiesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### countries

```php
$models = $client->getCountries((new CountriesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### districts

```php
$models = $client->getDistricts((new DistrictsQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### facilityTypes

```php
$models = $client->getFacilityTypes((new FacilityTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### hotelFacilityTypes

```php
$models = $client->getHotelFacilityTypes((new HotelFacilityTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### hotels

```php
$models = $client->getHotels((new HotelsQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getInfo();
    // etc
}

```

### hotelThemeTypes

```php
$models = $client->getHotelThemeTypes((new HotelThemeTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### hotelTypes

```php
$models = $client->getHotelTypes((new HotelTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### paymentTypes

```php
$models = $client->getPaymentTypes((new PaymentTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### regions

```php
$models = $client->getRegions((new RegionsQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```

### roomFacilityTypes

```php
$models = $client->getRoomFacilityTypes((new RoomFacilityTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}
```

### roomTypes

```php
$models = $client->getRoomTypes((new RoomTypesQuery()));

foreach ($models as $model){
    print $model->getId();
    print $model->getName();
    // etc
}

```



## Support

Please [open an issue](https://github.com/DigitalBrands/booking-com-sdk/issues/new) for support.

## Contributing

Feel free to send a pull request!