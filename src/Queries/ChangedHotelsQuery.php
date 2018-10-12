<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCityIdsIn(array $values)
 * @method $this whereCountriesIn(array $values)
 * @method $this whereRegionIdsIn(array $values)
 */
class ChangedHotelsQuery extends QueryObject
{
    /**
     * @var \DateTime
     */
    private $lastChange;

    /**
     * ChangedHotelsQuery constructor.
     *
     * @param \DateTime $lastChange
     */
    public function __construct(\DateTime $lastChange)
    {
        $this->setLastChange($lastChange);
    }

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'city_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'countries' => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'region_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }

    public function setLastChange(\DateTime $lastChange): self
    {
        $this->lastChange = $lastChange;
        return $this;
    }

    public function toArray(): array
    {
        return array_merge(['last_change' => $this->lastChange->format('Y-m-d H:i:s')], parent::toArray());
    }


}