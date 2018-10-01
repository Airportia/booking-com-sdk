<?php

namespace BookingSDK\Resource\Posts;


use BookingSDK\Resource\Resource;

class PostResource extends Resource
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var array */
    protected $comments;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id       = (int)$data['id'];
        $this->title    = (string)$data['title'];
        $this->comments = (array)$data['comments'];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'    => $this->getId(),
            'title' => $this->getTitle(),
        ];
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }


    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->getId();
    }


}