<?php
/**
 * Created by PhpStorm.
 * User: yaroslav
 * Date: 02.10.18
 * Time: 11:18
 */

namespace BookingSDK\Resource\Posts\Comments;


use BookingSDK\Resource\CollectionResource;

class CommentsCollection extends CollectionResource
{
    /**
     * @return string
     */
    public function getResourceClass(): string
    {
        return CommentsItem::class;
    }

}