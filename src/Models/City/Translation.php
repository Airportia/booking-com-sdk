<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 28.10.18
 */

namespace BookingCom\Models\City;


use BookingCom\Models\AbstractModel;

class Translation extends AbstractModel
{
    /**
     * @var string
     */
    private $language;
    /**
     * @var string
     */
    private $name;

    /**
     * Translation constructor.
     * @param string $language
     * @param string $name
     */
    public function __construct(string $language, string $name)
    {
        $this->language = $language;
        $this->name = $name;
    }


    /**
     * @param array $array
     * @return mixed
     */
    public static function fromArray(array $array)
    {
        return new self($array['language'], $array['name']);
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}