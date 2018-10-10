<?php

namespace BookingCom\Queries\Operations;


class Where extends OperationObject
{

    /**
     * @param array $allowedMethods
     * @return bool
     */
    public function matchMethod(array $allowedMethods): bool
    {
        if ( ! strpos($this->getMethod(), 'where') === 0 || !\in_array($this->getMethod(), $allowedMethods, true)) {
            trigger_error('Call to undefined method '.__CLASS__.'::'.$this->getMethod().'()', E_USER_ERROR);
        }

        return true;
    }

}