<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 04.11.18
 */

namespace BookingCom\Models\Autocomplete;

use BookingCom\Models\AbstractModel;

class Endorsement extends AbstractModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $count;

    public function __construct(int $id, string $name, int $count)
    {
        $this->id = $id;
        $this->name = $name;
        $this->count = $count;
    }


    /**
     * @param array $array
     * @return mixed
     */
    public static function fromArray(array $array): self
    {
        return new self($array['id'], $array['name'], $array['count']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
}
