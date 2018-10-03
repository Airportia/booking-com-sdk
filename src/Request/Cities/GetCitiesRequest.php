<?php

namespace BookingSDK\Request\Cities;


use BookingSDK\Request\Request;
use BookingSDK\Resource\Cities\CitiesCollection;

class GetCitiesRequest extends Request
{
    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return CitiesCollection::class;
    }

}