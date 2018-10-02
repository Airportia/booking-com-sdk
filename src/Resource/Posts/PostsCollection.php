<?php

namespace BookingSDK\Resource\Posts;


use BookingSDK\Resource\CollectionResource;

class PostsCollection extends CollectionResource
{
    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return PostsItem::class;
    }
}