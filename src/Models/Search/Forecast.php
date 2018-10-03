<?php

namespace BookingCom\Models\Search;


class Forecast
{
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

    public function __construct(string $icon,
        int $maxTempFahrenheit,
        int $minTempCelsius,
        int $minTempFahrenheit,
        int $maxTempCelsius)
    {
        $this->icon              = $icon;
        $this->maxTempFahrenheit = $maxTempFahrenheit;
        $this->minTempCelsius    = $minTempCelsius;
        $this->minTempFahrenheit = $minTempFahrenheit;
        $this->maxTempCelsius    = $maxTempCelsius;
    }

    public static function fromArray(array $array)
    {
        return new self($array['icon'], $array['max_temp_f'],
            $array['min_temp_c'], $array['min_temp_f'], $array['max_temp_c']);
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getMaxTempFahrenheit(): int
    {
        return $this->maxTempFahrenheit;
    }

    /**
     * @return int
     */
    public function getMinTempCelsius(): int
    {
        return $this->minTempCelsius;
    }

    /**
     * @return int
     */
    public function getMinTempFahrenheit(): int
    {
        return $this->minTempFahrenheit;
    }

    /**
     * @return int
     */
    public function getMaxTempCelsius(): int
    {
        return $this->maxTempCelsius;
    }

}