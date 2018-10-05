<?php

namespace BookingCom\Models\Search;


use BookingCom\BookingObject;

class Forecast extends BookingObject
{
    public const UNIT_CELSIUS = 'celsius';
    public const UNIT_FAHRENHEIT = 'fahrenheit';

    /** @var  string */
    private $icon;

    /** @var  integer */
    private $maxTempFahrenheit;

    /** @var  integer */
    private $minTempCelsius;

    /** @var  integer */
    private $minTempFahrenheit;

    /** @var  integer */
    private $maxTempCelsius;

    public function __construct(string $icon, int $maxTempFahrenheit, int $minTempCelsius, int $minTempFahrenheit, int $maxTempCelsius)
    {
        $this->icon              = $icon;
        $this->maxTempFahrenheit = $maxTempFahrenheit;
        $this->minTempCelsius    = $minTempCelsius;
        $this->minTempFahrenheit = $minTempFahrenheit;
        $this->maxTempCelsius    = $maxTempCelsius;
    }

    /**
     * @param array $array
     * @return Forecast
     */
    public static function fromArray(array $array): Forecast
    {
        return new self($array['icon'], $array['max_temp_f'], $array['min_temp_c'], $array['min_temp_f'], $array['max_temp_c']);
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getMax(string $unit = self::UNIT_CELSIUS): int
    {
        return $unit === self::UNIT_CELSIUS ? $this->maxTempCelsius : $this->maxTempFahrenheit;
    }

    public function getMin(string $unit = self::UNIT_CELSIUS): int
    {
        return $unit === self::UNIT_CELSIUS ? $this->minTempCelsius : $this->minTempFahrenheit;
    }

}