<?php
/**
 * Created by PhpStorm.
 * User: yaroslav
 * Date: 02.10.18
 * Time: 16:23
 */

namespace BookingSDK\Resource\Cities;


use BookingSDK\Resource\Resource;

class CitiesItem extends Resource
{

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    public function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }


}