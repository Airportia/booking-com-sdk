<?php
require 'vendor/autoload.php';

use BookingSDK\Client;
use BookingSDK\Connection\FakeClient;

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
        ],
    ],
]);

$client = new Client('https://jsonplaceholder.typicode.com', FakeClient::class);
//$client = new Client('https://jsonplaceholder.typicode.com');
//$hotels = $client->getHotels();
$posts = $client->getPosts();
echo json_encode($posts, JSON_PRETTY_PRINT);
//foreach ($posts as $post){
//    print_r([
//        'id'    => $post->getId(),
//        'title' => $post->getTitle(),
//    ]);
//}
//$post = $client->getPost(1);
//print_r([
//    'id'    => $post->getId(),
//    'title' => $post->getTitle(),
//]);