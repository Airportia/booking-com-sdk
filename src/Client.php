<?php

namespace BookingSDK;

use BookingSDK\Request\Hotels\GetHotelsRequest;
use BookingSDK\Request\Posts\GetPostRequest;
use BookingSDK\Request\Posts\GetPostsRequest;
use BookingSDK\Request\RequestInterface;
use BookingSDK\Request\Response;
use BookingSDK\Resource\Hotels\HotelsResource;
use BookingSDK\Resource\Posts\PostResource;
use BookingSDK\Resource\Posts\PostsResource;
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

        $this->guzzle = $client
            ? new $client($config)
            : new GuzzleHttp\Client($config);
    }

    /**
     * @param $id
     *
     * @return \BookingSDK\Resource\Posts\PostResource
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPost($id): PostResource
    {
        return $this->send(new GetPostRequest($id))->getResource();
    }

    /**
     * @param \BookingSDK\Request\RequestInterface $request
     *
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
     * @return \BookingSDK\Resource\Posts\PostsResource
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPosts(): PostsResource
    {
        return $this->send(new GetPostsRequest())->getResource();
    }

    public function getHotels(): HotelsResource
    {
        return $this->send(new GetHotelsRequest())->getResource();
    }
}