<?php

namespace BookingCom\Tests\Models\Search;

use BookingCom\Models\Search\Forecast;
use PHPUnit\Framework\TestCase;

class ForecastTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $forecast = Forecast::fromArray([
            'icon'       => 'sun',
            'max_temp_f' => 63,
            'min_temp_c' => 9,
            'min_temp_f' => 48,
            'max_temp_c' => 17,
        ]);

        $this->assertEquals('sun', $forecast->getIcon());
        $this->assertEquals(63, $forecast->getMaxTempFahrenheit());
        $this->assertEquals(9, $forecast->getMinTempCelsius());
        $this->assertEquals(48, $forecast->getMinTempFahrenheit());
        $this->assertEquals(17, $forecast->getMaxTempCelsius());
    }
}
