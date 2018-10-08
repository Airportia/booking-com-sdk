<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereTypeIn(array $values)
 * @method $this whereCityIn(array $values)
 * @method $this whereCountryIn(array $values)
 */
class DistrictsQuery extends QueryObject
{
    public const DISTRICT_TYPES = ['free', 'official'];

    /** @var  array */
    protected $cityIn;

    /** @var  array */
    protected $countryIn;

    /** @var  array */
    protected $idIn;

    /** @var  array */
    protected $typeIn;

    /** @var  array */
    protected $extras = [];

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        if ($this->cityIn) {
            $result['city_ids'] = implode(',', $this->cityIn);
        }
        if ($this->countryIn) {
            $result['countries'] = implode(',', $this->countryIn);
        }
        if ($this->idIn) {
            $result['district_ids'] = implode(',', $this->idIn);
        }
        if ($this->typeIn) {
            $result['district_types'] = implode(',', $this->typeIn);
        }
        if ($this->extras) {
            $result['extras'] = implode(',', $this->extras);
        }

        return $result;
    }

    /**
     * @return DistrictsQuery
     */
    public function withLocation(): self
    {
        $this->addToExtras('location', $this);

        return $this;
    }

    /**
     * @return array
     */
    protected function getAsserts(): array
    {
        return  [
            'idIn' => [
                'type' => self::ASSERT_ID,
            ],
            'cityIn' => [
                'type' => self::ASSERT_ID,
            ],
            'countryIn' => [
                'type' => self::ASSERT_COUNTRY,
            ],
            'typeIn' => [
                'type' => self::ASSERT_ONE_OF,
                'allowed' => self::DISTRICT_TYPES,
            ],
        ];
    }

}