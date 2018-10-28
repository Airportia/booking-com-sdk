<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 28.10.18
 */

namespace BookingCom\Queries\QueryFields;


class WithArrayQueryField extends WhereInQueryField
{
    /**
     * @return array
     */
    protected function getMethodNames(): array
    {
        $camelized = $this->camelize($this->fieldName);

        return ["with{$camelized}"];
    }
}