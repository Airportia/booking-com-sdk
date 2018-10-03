<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom\Models;


class Timezone
{


    /** @var int */
    private $offset;

    /** @var string */
    private $name;

    public function __construct(int $offset, string $name)
    {

        $this->offset = $offset;
        $this->name = $name;
    }

    public static function fromArray(array $array): Timezone
    {
        return new self($array['offset'], $array['name']);
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}