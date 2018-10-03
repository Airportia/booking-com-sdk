<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom;


interface ConnectionInterface
{
    public function getRegions();

    public function getCities();
}