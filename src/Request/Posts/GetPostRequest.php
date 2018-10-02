<?php

namespace BookingSDK\Request\Posts;


use BookingSDK\Request\Request;
use BookingSDK\Resource\Posts\PostsItem;

class GetPostRequest extends Request
{
    /** @var string */
    protected $path = '/posts/{postId}';
    /** @var string */
    protected $method = 'GET';

    public function __construct($postId)
    {
        $this->path = str_replace('{postId}', $postId, $this->path);
    }

    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return PostsItem::class;
    }
}