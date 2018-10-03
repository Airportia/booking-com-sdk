<?php

namespace BookingSDK\Resource\Hotels;


use BookingSDK\Resource\CollectionResource;

class HotelsCollection extends CollectionResource
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
    }

    public function getResourceClass(): string
    {
        // TODO: Implement getResourceClass() method.
    }


}