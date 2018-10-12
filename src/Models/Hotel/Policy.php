<?php

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;

class Policy extends AbstractModel
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $content;
    /**
     * @var string
     */
    private $type;


    /**
     * Policy constructor.
     */
    public function __construct(string $name, string $content, string $type)
    {
        $this->name = $name;
        $this->content = $content;
        $this->type = $type;
    }

    public static function fromArray(array $array): self
    {
        return new self($array['name'], $array['content'], $array['type']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
