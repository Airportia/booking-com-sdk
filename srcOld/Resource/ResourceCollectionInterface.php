<?php

namespace BookingSDK\Resource;


interface ResourceCollectionInterface extends ResourceInterface
{
    /**
     * @return string
     */
    public function getResourceClass(): string;
}
