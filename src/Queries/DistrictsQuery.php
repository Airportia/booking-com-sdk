<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Operations\With;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereTypeIn(array $values)
 * @method $this whereCityIn(array $values)
 * @method $this whereCountryIn(array $values)
 * @method $this withLocation()
 */
class DistrictsQuery extends QueryObject
{
    public const DISTRICT_TYPES = ['free', 'official'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'district_ids'   => [
                'operation'      => [Where::class],
                'validator'      => [IntegerValidator::class],
                'property_name' => 'idIn',
                'result_type'    => self::RESULT_IMPLODE,
            ],
            'city_ids'       => [
                'operation'      => [Where::class],
                'validator'      => [IntegerValidator::class],
                'property_name' => 'cityIn',
                'result_type'    => self::RESULT_IMPLODE,
            ],
            'countries'      => [
                'operation'      => [Where::class],
                'validator'      => [CountryValidator::class],
                'property_name' => 'countryIn',
                'result_type'    => self::RESULT_IMPLODE,
            ],
            'district_types' => [
                'operation'      => [Where::class],
                'validator'      => [OneOfValidator::class, ['values' => self::DISTRICT_TYPES]],
                'property_name' => 'typeIn',
                'result_type'    => self::RESULT_IMPLODE,
            ],
//            'extras'         => [
//                'operation'      => [With::class],
//                'property_names' => ['location'],
//                'result_type'    => self::RESULT_IMPLODE,
//            ],
        ];
    }

}