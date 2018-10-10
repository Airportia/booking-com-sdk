<?php

namespace BookingCom\Queries\Operations;


class With extends OperationObject
{

    /**
     * @param array $allowedMethods
     * @return bool
     */
    public function matchMethod(array $allowedMethods): bool
    {
        if ( ! strpos($this->getMethod(), 'with') === 0 || ! \in_array($this->getMethod(), $allowedMethods, true)) {
            trigger_error('Call to undefined method '.__CLASS__.'::'.$this->getMethod().'()', E_USER_ERROR);
        }

        return true;
    }


    /**
     * @return mixed
     */
    public function getValue()
    {
        $array  = preg_split('#([A-Z][^A-Z]*)#', $this->getMethod(), null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $sliced = \array_slice($array, 1);
        $k      = 0;
        $result = '';

        foreach ($sliced as $item) {
            $result .= lcfirst($item);
            if (isset($sliced[$k + 1])) {
                $result .= '_';
            }
            $k++;
        }

        return $result;
    }
}