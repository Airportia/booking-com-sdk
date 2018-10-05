<?php

namespace BookingSDK\Resource\Posts;


use BookingSDK\Resource\Posts\Comments\CommentsCollection;
use BookingSDK\Resource\Resource;

class PostsItem extends Resource
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var CommentsCollection */
    protected $comments;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id       = (int)$data['id'];
        $this->title    = isset($data['title']) ? (string)$data['title'] : '';
        $this->comments = isset($data['comments']) ? new CommentsCollection((array)$data['comments']) : new CommentsCollection([]);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'       => $this->getId(),
            'title'    => $this->getTitle(),
            'comments' => $this->getCommentsArray(),
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
    public function getCommentsArray(): array
    {
        return $this->comments->toArray();
    }

    /**
     * @return CommentsCollection
     */
    public function getComments(): CommentsCollection
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