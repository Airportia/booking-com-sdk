<?php

namespace BookingSDK\Request\Hotels;


use BookingSDK\Request\Request;
use BookingSDK\Resource\Hotels\HotelsResource;

class GetHotelsRequest extends Request
{
    /** @var string */
    protected $path = '/hotels';
    /** @var string */
    protected $method = 'GET';

    public function getResourceClass(): string
    {
        return HotelsResource::class;
    }

}