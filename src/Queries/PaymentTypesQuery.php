<?php

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this wherePaymentIdsIn(array $values)
 */
class PaymentTypesQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'payment_ids' => [
                'operation'    => [WhereInQueryField::class],
                'validator'    => [IntegerValidator::class],
            ],
        ];
    }
}