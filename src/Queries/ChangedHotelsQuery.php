<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\StringValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCityIdsIn(array $values)
 * @method $this whereCountriesIn(array $values)
 * @method $this whereRegionIdsIn(array $values)
 * @method $this whereLastChangeIn(array $values)
 */
class ChangedHotelsQuery extends QueryObject
{

    /**
     * ChangedHotelsQuery constructor.
     *
     * @param string $requiredParam
     */
    public function __construct(string $requiredParam)
    {
        $this->whereLastChangeIn([$requiredParam]);
    }

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'city_ids'    => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'countries'   => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'region_ids'  => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'last_change' => [
                'operation' => [WhereInCondition::class],
                'validator' => [StringValidator::class],
            ],
        ];
    }
}