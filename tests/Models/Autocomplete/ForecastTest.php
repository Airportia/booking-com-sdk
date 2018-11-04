<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 04.11.18
 */

namespace BookingCom\Tests\Models\Autocomplete;


use BookingCom\Models\Autocomplete\Forecast;
use PHPUnit\Framework\TestCase;

class ForecastTest extends TestCase
{
    public function testFromArray(): void
    {
        $model = Forecast::fromArray([
            'icon' => 'sun',
            'max_temp_c' => 11,
            'min_temp_c' => 4,
            'max_temp_f' => 52,
            'min_temp_f' => 39,
        ]);

        $this->assertEquals('sun', $model->getIcon());
        $this->assertEquals(11, $model->getMaxTemp(Forecast::UNIT_C));
        $this->assertEquals(52, $model->getMaxTemp(Forecast::UNIT_F));
        $this->assertEquals(4, $model->getMinTemp(Forecast::UNIT_C));
        $this->assertEquals(39, $model->getMinTemp(Forecast::UNIT_F));
    }

}