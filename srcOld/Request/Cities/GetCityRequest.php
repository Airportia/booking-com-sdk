<?php
/**
 * Created by PhpStorm.
 * User: yaroslav
 * Date: 02.10.18
 * Time: 16:29
 */

namespace BookingSDK\Request\Cities;


use BookingSDK\Request\Request;
use BookingSDK\Resource\Cities\CitiesItem;

class GetCityRequest extends Request
{
    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return CitiesItem::class;
    }

}