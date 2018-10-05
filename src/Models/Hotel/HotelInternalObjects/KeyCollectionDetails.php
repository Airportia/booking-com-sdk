<?php

namespace BookingCom\Models\Hotel\HotelInternalObjects;


use BookingCom\BookingObject;

class KeyCollectionDetails extends BookingObject
{
    /** @var  AlternativeKeyLocationDetails|null */
    private $alternativeKeyLocation;

    /** @var  string|null */
    private $otherText;

    /** @var  string */
    private $key_location;

    /** @var  string */
    private $howToCollect;

    /**
     * KeyCollectionDetails constructor.
     *
     * @param AlternativeKeyLocationDetails|null $alternativeKeyLocation
     * @param null|string                        $otherText
     * @param string                             $key_location
     * @param string                             $howToCollect
     */
    public function __construct(? AlternativeKeyLocationDetails $alternativeKeyLocation, ? string $otherText, string $key_location, string $howToCollect)
    {
        $this->alternativeKeyLocation = $alternativeKeyLocation;
        $this->otherText              = $otherText;
        $this->key_location           = $key_location;
        $this->howToCollect           = $howToCollect;
    }

    public static function fromArray(array $array): KeyCollectionDetails
    {
        $alternativeKeyLocation = self::makeChildrenFromArray($array, AlternativeKeyLocationDetails::class, 'alternative_key_location', self::SINGLE_CHILD);

        $otherText = $array['other_text'] ?? null;

        return new self($alternativeKeyLocation, $otherText, $array['key_location'], $array['how_to_collect']);
    }

    /**
     * @return AlternativeKeyLocationDetails|null
     */
    public function getAlternativeKeyLocation(): ? AlternativeKeyLocationDetails
    {
        return $this->alternativeKeyLocation;
    }

    /**
     * @return null|string
     */
    public function getOtherText():? string
    {
        return $this->otherText;
    }

    /**
     * @return string
     */
    public function getKeyLocation(): string
    {
        return $this->key_location;
    }

    /**
     * @return string
     */
    public function getHowToCollect(): string
    {
        return $this->howToCollect;
    }

}