<?php

namespace BookingCom\Models\Search;


class Endorsement
{
    /** @var  string */
    private $name;

    /** @var  integer */
    private $count;

    /** @var  integer */
    private $id;

    /**
     * Endorsement constructor.
     *
     * @param string $name
     * @param int    $count
     * @param int    $id
     */
    public function __construct(string $name,
        int $count,
        int $id)
    {
        $this->name  = $name;
        $this->count = $count;
        $this->id    = $id;
    }

    public static function fromArray(array $array): Endorsement
    {
        return new self($array['name'], $array['count'], $array['id']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}