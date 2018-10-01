<?php

namespace BookingSDK\Request\Posts;


use BookingSDK\Request\Request;
use BookingSDK\Resource\Posts\PostsResource;

class GetPostsRequest extends Request
{
    /** @var string */
    protected $path = '/posts';
    /** @var string */
    protected $method = 'GET';

    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return PostsResource::class;
    }
}