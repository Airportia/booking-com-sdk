<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

class HotelFacilityTypesQuery extends QueryObject
{
    public const RESULT_TYPE = ['string', 'boolean', 'integer'];

    /** @var  array */
    protected $facilityIn;

    /** @var  array */
    protected $idIn;

    /** @var  array */
    protected $typeIn;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        if ($this->idIn) {
            $result['hotel_facility_type_ids'] = implode(',', $this->idIn);
        }
        if ($this->facilityIn) {
            $result['facility_type_ids'] = implode(',', $this->facilityIn);
        }
        if ($this->typeIn) {
            $result['types'] = implode(',', $this->typeIn);
        }

        return $result;
    }

    /**
     * @param array $values
     * @return HotelFacilityTypesQuery
     */
    public function whereIdIn(array $values): self
    {
        $this->where('idIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return HotelFacilityTypesQuery
     */
    public function whereTypeIn(array $values): self
    {
        $this->where('typeIn', $values);

        return $this;
    }

    /**
     * @param array $values
     * @return HotelFacilityTypesQuery
     */
    public function whereFacilityIn(array $values): self
    {
        $this->where('facilityIn', $values);

        return $this;
    }

    /**
     * @return array
     */
    public function getAsserts(): array
    {
        return [
            'idIn'       => [
                'type' => self::ASSERT_ID,
            ],
            'facilityIn' => [
                'type' => self::ASSERT_ID,
            ],
            'typeIn'     => [
                'type'    => self::ASSERT_ONE_OF,
                'allowed' => self::RESULT_TYPE,
            ],
        ];
    }
}