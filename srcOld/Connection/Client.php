<?php

namespace BookingSDK\Connection;

use BookingSDK\Request\Posts\GetPostRequest;
use BookingSDK\Request\Posts\GetPostsRequest;
use BookingSDK\Request\RequestInterface;
use BookingSDK\Request\Response;
use BookingSDK\Resource\Posts\PostsCollection;
use BookingSDK\Resource\Posts\PostsItem;
use GuzzleHttp;

class Client
{
    /** @var string */
    protected $baseUrl;

    /** @var GuzzleHttp\ClientInterface */
    protected $guzzle;

    /**
     * @param string      $baseUrl
     * @param string|null $client
     */
    public function __construct($baseUrl, string $client = null)
    {
        $config = [
            'base_uri' => $baseUrl,
        ];

        $this->guzzle = $client ? new $client($config) : new GuzzleHttp\Client($config);
    }

    /**
     * @return \BookingSDK\Resource\Posts\PostsCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPosts(): PostsCollection
    {
        return $this->send(new GetPostsRequest())->getResource();
    }

    /**
     * @param \BookingSDK\Request\RequestInterface $request
     * @return \BookingSDK\Request\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(RequestInterface $request): Response
    {
        $method        = $request->getMethod();
        $path          = $request->getPath();
        $params        = $request->getParams();
        $headers       = $request->getHeaders();
        $response      = $this->guzzle->request($method, $path, [
            'params'  => $params,
            'headers' => $headers,
        ]);
        $resourceClass = $request->getResourceClass();

        return new Response($this, $response, $resourceClass);
    }

    /**
     * @param $id
     * @return \BookingSDK\Resource\Posts\PostsItem
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPost($id): PostsItem
    {
        return $this->send(new GetPostRequest($id))->getResource();
    }

}