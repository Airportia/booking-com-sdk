<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

class RegionsQuery extends QueryObject
{
    public const REGION_TYPES = ['island', 'province', 'free_region', 'other'];

    /** @var  array */
    protected $idIn;

    /** @var  array */
    protected $countryIn;

    /** @var  array */
    protected $typeIn;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        if ($this->idIn) {
            $result['region_ids'] = implode(',', $this->idIn);
        }
        if ($this->countryIn) {
            $result['countries'] = implode(',', $this->countryIn);
        }
        if ($this->typeIn) {
            $result['region_types'] = implode(',', $this->typeIn);
        }

        return $result;
    }

    /**
     * @param array $values
     * @return RegionsQuery
     */
    public function whereIdIn(array $values): self
    {
        $this->where('idIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return RegionsQuery
     */
    public function whereCountryIn(array $values): self
    {
        $this->where('countryIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return RegionsQuery
     */
    public function whereTypeIn(array $values): self
    {
        $this->where('typeIn', $values);

        return $this;
    }

    /**
     * @return array
     */
    public function getAsserts(): array
    {
        return [
            'idIn'      => [
                'type' => self::ASSERT_ID,
            ],
            'countryIn' => [
                'type' => self::ASSERT_COUNTRY,
            ],
            'typeIn'    => [
                'type'    => self::ASSERT_ONE_OF,
                'allowed' => self::REGION_TYPES,
            ],
        ];
    }
}