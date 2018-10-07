<?php

namespace BookingCom\Models\Room;


use BookingCom\BookingObject;

class BedType extends BookingObject
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $count;

    /** @var  string */
    private $descriptionImperial;

    /** @var  integer */
    private $configurationId;

    /** @var  string */
    private $description;

    /**
     * BedType constructor.
     *
     * @param string $name
     * @param string $count
     * @param string $descriptionImperial
     * @param int    $configurationId
     * @param string $description
     */
    public function __construct(
        string $name,
        string $count,
        string $descriptionImperial,
        int $configurationId,
        string $description
    ) {
        $this->name = $name;
        $this->count = $count;
        $this->descriptionImperial = $descriptionImperial;
        $this->configurationId = $configurationId;
        $this->description = $description;
    }

    public static function fromArray(array $array): BedType
    {
        return new self($array['name'], $array['count'], $array['description_imperial'], $array['configuration_id'],
            $array['description']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCount(): string
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getDescriptionImperial(): string
    {
        return $this->descriptionImperial;
    }

    /**
     * @return int
     */
    public function getConfigurationId(): int
    {
        return $this->configurationId;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}