<?php

namespace BookingSDK\Test\Unit;

use BookingSDK\Connection\Client;
use BookingSDK\Connection\FakeClient;
use BookingSDK\Resource\Posts\Comments\CommentsItem;
use BookingSDK\Resource\Posts\Comments\CommentsCollection;
use BookingSDK\Resource\Posts\PostsItem;
use BookingSDK\Resource\Posts\PostsCollection;

class BookingTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $postClient;

    /** @var  Client */
    protected $postFakeClient;


    /**
     * BookingTest constructor.
     *
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->postClient = new Client('https://jsonplaceholder.typicode.com');
        $this->postFakeClient
                          = new Client('https://jsonplaceholder.typicode.com',
            FakeClient::class);
    }

    /**
     * @return void
     */
    public function testPosts()
    {
        $result = $this->postClient->getPosts();
        $this->assertInstanceOf(PostsCollection::class, $result);
    }

    /**
     * @return void
     */
    public function testFakePosts()
    {
        FakeClient::setResponses([
            '/posts' => [
                'GET' => [
                    [
                        'id'       => 1,
                        'title'    => 'Test!',
                        'comments' => [
                            [
                                'id'   => 1,
                                'text' => 'Test Test!',
                            ],
                            [
                                'id'   => 2,
                                'text' => 'Test Test Test!!!!!!',
                            ],
                        ],
                    ],
                    [
                        'id'       => 2,
                        'title'    => '2!',
                        'comments' => [
                            [
                                'id'   => 1,
                                'text' => 'Test Tes2t!',
                            ],
                            [
                                'id'   => 2,
                                'text' => 'Test 2 Test!!!!!!',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
        $result = $this->postFakeClient->getPosts();
        $this->assertInstanceOf(PostsCollection::class, $result);
    }

    public function testGetSinglePost()
    {
        $result = $this->postClient->getPost(1);
        $this->assertInstanceOf(PostsItem::class, $result);
    }

    public function testGetFakeComments()
    {
        FakeClient::setResponses([
            '/posts/1' => [
                'GET' => [
                    'id'       => 1,
                    'title'    => 'Test!',
                    'comments' => [
                        [
                            'id'   => 1,
                            'text' => 'Test Test!',
                        ],
                        [
                            'id'   => 2,
                            'text' => 'Test Test Test!!!!!!',
                        ],
                    ],
                ],
            ],
        ]);
        $result = $this->postFakeClient->getPost(1)->getComments();
        $this->assertInstanceOf(CommentsCollection::class, $result);
    }

    public function testGetFakeComment()
    {
        FakeClient::setResponses([
            '/posts/1' => [
                'GET' => [
                    'id'       => 1,
                    'title'    => 'Test!',
                    'comments' => [
                        [
                            'id'   => 1,
                            'text' => 'Test Test!',
                        ],
                        [
                            'id'   => 2,
                            'text' => 'Test Test Test!!!!!!',
                        ],
                    ],
                ],
            ],
        ]);
        $result = $this->postFakeClient->getPost(1)->getComments()[0];
        $this->assertInstanceOf(CommentsItem::class, $result);
    }


}