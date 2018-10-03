<?php

namespace BookingCom;


interface ConnectionInterface
{
    public function getRegions();

    public function getCities();
}