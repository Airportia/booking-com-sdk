<?php

namespace BookingSDK\Resource;


use BookingSDK\Connection\Client;

abstract class CollectionResource implements ResourceCollectionInterface,
    \ArrayAccess, \IteratorAggregate
{
    /** @var int */
    protected $position = 0;

    /** @var array */
    protected $collection = [];

    /** @var array */
    protected $rawData;

    /** @var  Client */
    protected $client;

    /**
     * CollectionResource constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;
        $resourceClass = $this->getResourceClass();
        foreach ($data as $key => $item) {
            $this->collection[$key] = new $resourceClass($item);
        }
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->rawData;
    }

    /**
     * @param $offset
     * @param $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->collection[] = $value;
        } else {
            $this->collection[$offset] = $value;
        }
    }

    /**
     * @param $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * @param $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    /**
     * @param $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->collection[$offset]) ? $this->collection[$offset]
            : null;
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this->collection as $item) {
            $result[$item->getIdentifier()] = $item->toArray();
        }

        return $result;
    }


}