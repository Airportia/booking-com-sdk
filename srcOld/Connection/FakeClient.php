<?php

namespace BookingSDK\Connection;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class FakeClient extends Client
{
    /** @var array */
    private static $responses = [];

    private static $errors
        = [
            404 => [
                'message' => 'Not Found',
            ],
        ];

    /**
     * FakeClient constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @param array $responses
     */
    public static function setResponses(array $responses)
    {
        self::$responses = $responses;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     * @return Response
     */
    public function request($method, $uri = '', array $options = [])
    {
        $urlParams = parse_url($uri);
        $path      = $urlParams['path'];
        $code      = 200;

        if ( ! isset(self::$responses[$path][$method])) {
            $code   = 404;
            $result = self::$errors[$code];
        } else {
            $result = self::$responses[$path][$method];
        }

        return new Response($code, [], json_encode($result));
    }

}