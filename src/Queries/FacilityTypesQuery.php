<?php

namespace BookingCom\Queries;


use BookingCom\QueryObject;

class FacilityTypesQuery extends QueryObject
{
    /** @var  array */
    protected $idIn;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        if ($this->idIn) {
            $result['facility_type_ids'] = implode(',', $this->idIn);
        }

        return $result;
    }

    /**
     * @param array $values
     * @return FacilityTypesQuery
     */
    public function whereIdIn(array $values): self
    {
        $this->where('idIn', $values);

        return $this;
    }

    /**
     * @return array
     */
    public function getAsserts(): array
    {
        return [
            'idIn' => [
                'type' => self::ASSERT_ID,
            ],
        ];
    }
}