<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 29.10.18
 */

namespace BookingCom\Models\Country;


class Translation extends \BookingCom\Models\Translation
{
    /**
     * @var string
     */
    private $area;

    public function __construct(string $language, string $name, string $area)
    {
        parent::__construct($language, $name);
        $this->area = $area;
    }


    public static function fromArray(array $array)
    {
        return new static($array['language'], $array['name'], $array['area']);
    }

    public function getArea(): string
    {
        return $this->area;
    }

}