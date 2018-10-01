<?php

namespace BookingSDK\Test\Unit;

use BookingSDK\Client;

class BookingTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $client;

    /**
     * BookingTests constructor.
     *
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testFakePosts()
    {
        $this->client = new Client('https://jsonplaceholder.typicode.com');
        $result = $this->client->getPosts();
        $this->assertInternalType('array', $result);
    }

}