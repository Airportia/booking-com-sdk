<?php
/**
 * Created by PhpStorm.
 * User: yaroslav
 * Date: 01.10.18
 * Time: 17:24
 */

namespace BookingSDK\Resource;


interface Arrayable
{

    /**
     * @return array
     */
    public function toArray(): array;

}