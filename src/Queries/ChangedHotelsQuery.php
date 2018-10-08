<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

class ChangedHotelsQuery extends QueryObject
{
    /** @var  array */
    protected $cityIn;

    /** @var  array */
    protected $countryIn;

    /** @var  array */
    protected $regionIn;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        if ($this->cityIn) {
            $result['city_ids'] = implode(',', $this->cityIn);
        }
        if ($this->cityIn) {
            $result['countries'] = implode(',', $this->countryIn);
        }
        if ($this->cityIn) {
            $result['region_ids'] = implode(',', $this->regionIn);
        }

        return $result;
    }

    /**
     * @param array $values
     * @return ChangedHotelsQuery
     */
    public function whereCityIn(array $values): self
    {
        $this->where('cityIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return ChangedHotelsQuery
     */
    public function whereCountryIn(array $values): self
    {
        $this->where('countryIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return ChangedHotelsQuery
     */
    public function whereRegionIn(array $values): self
    {
        $this->where('regionIn', $values);

        return $this;
    }

    /**
     * @return array
     */
    public function getAsserts(): array
    {
        return [
            'cityIn'    => [
                'type' => self::ASSERT_ID,
            ],
            'countryIn' => [
                'type' => self::ASSERT_COUNTRY,
            ],
            'regionIn'  => [
                'type' => self::ASSERT_ID,
            ],
        ];
    }
}