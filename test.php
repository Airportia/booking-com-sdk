<?php
require 'vendor/autoload.php';

//FakeClient::setResponses([
//    '/posts' => [
//        'GET' => [
//            [
//                'id'       => 1,
//                'title'    => 'FacilityTypesQueryTest!',
//                'comments' => [
//                    [
//                        'id'   => 1,
//                        'text' => 'FacilityTypesQueryTest FacilityTypesQueryTest!',
//                    ],
//                    [
//                        'id'   => 2,
//                        'text' => 'FacilityTypesQueryTest FacilityTypesQueryTest FacilityTypesQueryTest!!!!!!',
//                    ],
//                ],
//            ],
//            [
//                'id'       => 2,
//                'title'    => '2!',
//                'comments' => [
//                    [
//                        'id'   => 1,
//                        'text' => 'FacilityTypesQueryTest Tes2t!',
//                    ],
//                    [
//                        'id'   => 2,
//                        'text' => 'FacilityTypesQueryTest 2 FacilityTypesQueryTest!!!!!!',
//                    ],
//                ],
//            ],
//        ],
//    ],
//]);

//$client = new Client('https://jsonplaceholder.typicode.com', FakeClient::class);
//$client = new Client('https://jsonplaceholder.typicode.com');
//$hotels = $client->getHotels();
//$posts = $client->getPosts();

//print_r($posts->jsonSerialize());
//foreach ($posts as $post){
//    $id = $post->getId();
//    $title = $post->getTitle();
//    $comments = $post->getComments();
//    print_r([
//        'id'    => $post->getId(),
//        'title' => $post->getTitle(),
//    ]);
//    foreach ($comments as $comment)
//    {
//        print_r([
//            'comments' => [
//                'id' => $comment->getId(),
//                'text' => $comment->getText(),
//            ]
//        ]);
//    }
//}
//$post = $client->getPost(1);
//print_r([
//    'id'    => $post->getId(),
//    'title' => $post->getTitle(),
//]);

$forecast = \BookingCom\Models\Search\Forecast::fromArray([
    'icon'       => 'sun',
    'max_temp_f' => 63,
    'min_temp_c' => 9,
    'min_temp_f' => 48,
    'max_temp_c' => 17,
]);

var_dump($forecast->getIcon());
die;