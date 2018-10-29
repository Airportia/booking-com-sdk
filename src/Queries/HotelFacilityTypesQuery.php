<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;

/**
 * @method $this whereFacilityTypeIdsIn(array $values)
 * @method $this whereHotelFacilityTypeIdsIn(array $values)
 * @method $this whereTypesIn(array $values)
 * @method $this withLanguages(array $values)
 */
class HotelFacilityTypesQuery extends AbstractQuery
{
    public const HOTEL_FACILITY_TYPES_RESULT_TYPES = ['string', 'boolean', 'integer'];

    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'facility_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_facility_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'types' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [OneOfValidator::class, ['values' => self::HOTEL_FACILITY_TYPES_RESULT_TYPES]],
            ],
            'languages' => [
                'operation' => [WithArrayQueryField::class],
                'validator' => [CountryValidator::class],
            ],
        ];
    }
}
