<?php
/**
 * Created by PhpStorm.
 * User: yaroslav
 * Date: 02.10.18
 * Time: 11:12
 */

namespace BookingSDK\Resource\Posts\Comments;


use BookingSDK\Resource\Resource;

class CommentsItem extends Resource
{
    /** @var  integer */
    protected $id;

    /** @var  string */
    protected $text;


    /**
     * CommentsItem constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id   = (int)$data['id'];
        $this->text = (string)$data['text'];
    }

    public function toArray(): array
    {
        return [
            'id'   => $this->getId(),
            'text' => $this->getText(),
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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getIdentifier()
    {
        return $this->id;
    }


}