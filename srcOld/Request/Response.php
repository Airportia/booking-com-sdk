<?php

namespace BookingSDK\Request;


use BookingSDK\Connection\Client;
use BookingSDK\Resource\ResourceInterface;
use GuzzleHttp\Psr7\Response as GuzzleResponse;

class Response
{
    /** @var \GuzzleHttp\Psr7\Response $response */
    protected $response;

    /** @var \BookingSDK\Resource\ResourceInterface */
    protected $resource;

    /**
     * Response constructor.
     *
     * @param Client         $client
     * @param GuzzleResponse $response
     * @param                $resource
     * @throws \Exception
     */
    public function __construct(Client $client, GuzzleResponse $response, $resource)
    {
        $this->response = $response;

        if ($response->getStatusCode() !== 200) {
            throw new \Exception($response->getBody()->getContents());
        }

        $this->resource = new $resource(json_decode($this->response->getBody()
            ->getContents(), true));

        $this->resource->setClient($client);
    }

    /**
     * @return GuzzleResponse
     */
    public function getResponse(): GuzzleResponse
    {
        return $this->response;
    }

    /**
     * @return \BookingSDK\Resource\ResourceInterface
     */
    public function getResource(): ResourceInterface
    {
        return $this->resource;
    }
}