<?php

namespace BookingSDK\Resource;

use BookingSDK\Connection\Client;

abstract class Resource implements ResourceInterface, ResourceItemInterface
{
    /** @var array */
    protected $rawData;

    /** @var  Client */
    protected $client;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;
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
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}