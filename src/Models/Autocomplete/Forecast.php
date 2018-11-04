<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 04.11.18
 */

namespace BookingCom\Models\Autocomplete;


use BookingCom\Models\AbstractModel;

class Forecast extends AbstractModel
{
    public const UNIT_C = 'c';
    public const UNIT_F = 'f';
    /**
     * @var string
     */
    private $icon;
    /**
     * @var int
     */
    private $maxC;
    /**
     * @var int
     */
    private $minC;
    /**
     * @var int
     */
    private $maxF;
    /**
     * @var int
     */
    private $minF;

    public function __construct(string $icon, int $maxC, int $minC, int $maxF, int $minF)
    {
        $this->icon = $icon;
        $this->maxC = $maxC;
        $this->minC = $minC;
        $this->maxF = $maxF;
        $this->minF = $minF;
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['icon'],
            $array['max_temp_c'],
            $array['min_temp_c'],
            $array['max_temp_f'],
            $array['min_temp_f']
        );
    }

    public function getMaxTemp(string $unit = self::UNIT_C): int
    {
        return $unit === self::UNIT_C ? $this->maxC : $this->maxF;
    }

    public function getMinTemp(string $unit = self::UNIT_C): int
    {
        return $unit === self::UNIT_C ? $this->minC : $this->minF;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}