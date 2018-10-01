<?php

namespace BookingSDK\Resource\Hotels;


use BookingSDK\Resource\CollectionResource;

class HotelsResource extends CollectionResource
{
    /**
     * HotelsResource constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        /** TODO */
        var_dump($data);
        die;
    }


}