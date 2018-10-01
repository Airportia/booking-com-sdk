<?php

namespace BookingSDK\Resource;


use BookingSDK\Client;

interface ResourceInterface extends Arrayable, \JsonSerializable
{
    /**
     * ResourceInterface constructor.
     *
     * @param array $data
     */
    public function __construct(array $data);

    /**
     * @param Client $client
     *
     * @return ResourceInterface
     */
    public function setClient(Client $client);

    /**
     * @return array
     */
    public function getRawData(): array;
}