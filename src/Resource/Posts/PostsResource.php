<?php

namespace BookingSDK\Resource\Posts;


use BookingSDK\Resource\CollectionResource;

class PostsResource extends CollectionResource
{
    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return PostResource::class;
    }
}