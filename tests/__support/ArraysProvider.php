<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 12.10.18
 */

namespace BookingCom\Tests\__support;


class ArraysProvider
{
    public const REGIONS = 'regions';
    public const CITIES = 'cities';

    public static function getItems(string $type): array
    {
        $data = json_decode(file_get_contents(__DIR__ . "/responses/$type.json"), true);
        return array_map(function ($regionArray) {
            return [$regionArray];
        }, $data['result']);
    }
}