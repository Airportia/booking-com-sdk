<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

class CountriesQuery extends QueryObject
{
    /** @var  array */
    protected $countryIn;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        if ($this->countryIn) {
            $result['countries'] = implode(',', $this->countryIn);
        }

        return $result;
    }

    public function whereCountryIn(array $values): self
    {
        $this->where('countryIn', $values);

        return $this;
    }

    public function getAsserts(): array
    {
        return [
            'countryIn' => [
                'type' => self::ASSERT_COUNTRY,
            ],
        ];
    }
}