<?php

namespace BookingCom\Models\Room;

use BookingCom\BookingObject;

class RoomInfo extends BookingObject
{
    /**
     * @var bool
     */
    private $isBookable;
    /**
     * @var string
     */
    private $roomType;
    /**
     * @var int
     */
    private $bedroomCount;
    /**
     * @var int
     */
    private $maxPrice;
    /**
     * @var int
     */
    private $minPrice;
    /**
     * @var int
     */
    private $bathroomCount;
    /**
     * @var int
     */
    private $roomTypeId;
    /**
     * @var int
     */
    private $ranking;
    /**
     * @var int
     */
    private $max_persons;
    /**
     * @var float
     */
    private $size;
    /**
     * @var BedConfiguration[]
     */
    private $bedConfigurations;

    /** @var Bedroom[] */
    private $bedrooms;

    public function __construct(
        bool $isBookable,
        string $roomType,
        int $bedroomCount,
        int $maxPrice,
        int $minPrice,
        int $bathroomCount,
        int $roomTypeId,
        int $ranking,
        int $max_persons,
        float $size,
        array $bedConfigurations,
        array $bedrooms
    ) {
        $this->isBookable = $isBookable;
        $this->roomType = $roomType;
        $this->bedroomCount = $bedroomCount;
        $this->maxPrice = $maxPrice;
        $this->minPrice = $minPrice;
        $this->bathroomCount = $bathroomCount;
        $this->roomTypeId = $roomTypeId;
        $this->ranking = $ranking;
        $this->max_persons = $max_persons;
        $this->size = $size;
        $this->bedConfigurations = $bedConfigurations;
        $this->bedrooms = $bedrooms;
    }

    public static function fromArray(array $array): RoomInfo
    {
        return new self(
            $array['bookable'],
            $array['room_type'],
            $array['bedroom_count'],
            $array['max_price'],
            $array['min_price'],
            $array['bathroom_count'],
            $array['room_type_id'],
            $array['ranking'],
            $array['max_persons'],
            $array['room_size']['metre_square'],
            self::makeChildrenFromArray($array, BedConfiguration::class, 'bed_configurations'),
            self::makeChildrenFromArray($array, Bedroom::class, 'bedrooms')
        );
    }

    /**
     * @return bool
     */
    public function isBookable(): bool
    {
        return $this->isBookable;
    }

    /**
     * @return string
     */
    public function getRoomType(): string
    {
        return $this->roomType;
    }

    /**
     * @return int
     */
    public function getBedroomCount(): int
    {
        return $this->bedroomCount;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int
    {
        return $this->minPrice;
    }

    /**
     * @return int
     */
    public function getBathroomCount(): int
    {
        return $this->bathroomCount;
    }

    /**
     * @return int
     */
    public function getRoomTypeId(): int
    {
        return $this->roomTypeId;
    }

    /**
     * @return int
     */
    public function getRanking(): int
    {
        return $this->ranking;
    }

    /**
     * @return int
     */
    public function getMaxPersons(): int
    {
        return $this->max_persons;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }

    /**
     * @return BedConfiguration[]
     */
    public function getBedConfigurations(): array
    {
        return $this->bedConfigurations;
    }

    /**
     * @return Bedroom[]
     */
    public function getBedrooms(): array
    {
        return $this->bedrooms;
    }
}
