<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 05.10.18
 */

namespace BookingCom\Tests;


use BookingCom\ConnectionException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testAuth(): void
    {
        $connection = $this->createConnection([new Response(200, [], '{"result":[{"hotel_id":10004}]}')], $container);
        $connection->execute('endpoint');

        /** @var Request $request */
        $request = $container[0]['request'];
        $authValue = 'Basic ' . base64_encode('login:password');
        $this->assertEquals($authValue, $request->getHeaderLine('Authorization'));
    }

    public function testExecute(): void
    {
        $connection = $this->createConnection([
            new Response(200, [],
                '{"result":[{"hotel_id":10004}]}'),
        ], $container);

        $connection->execute('endpoint', ['test' => 'test']);

        /** @var Request $request */
        $request = $container[0]['request'];
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('endpoint', $request->getUri()->getPath());
        $this->assertEquals('test=test', $request->getUri()->getQuery());
    }

    public function testBadResponseFormat(): void
    {
        $connection = $this->createConnection([
            new Response(200, [],
                '{"meta":{"ruid":"UmFuZG9tSVYkc2RlIyh9YfTdkabS+Lcwtoq6CbJJI87BErJ+73uR6n0+BB/2j20MnHkUwBWmA2aVAKWaG1ZFCBr3QfkFdXpoyYTSfW1DsDk="},"aaa":[{"hotel_id":10004}]}'),
        ], $container);

        $this->expectException(ConnectionException::class);
        $this->expectExceptionMessage('Bad response format');
        $connection->execute('endpoint');
    }

    public function testTextError(): void
    {
        $connection = $this->createConnection([new Response(404)], $container);
        $this->expectException(\BookingCom\ConnectionException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Bad response');
        $connection->execute('endpoint');
    }

    public function testJsonMessageError(): void
    {
        $connection = $this->createConnection([
            new Response(404, [], json_encode([
                'errors' => [
                    'code' => 1009,
                    'message' => 'Some error message',
                ],
            ])),
        ], $container);
        $this->expectException(\BookingCom\ConnectionException::class);
        $this->expectExceptionCode(1009);
        $this->expectExceptionMessage('Some error message');
        $connection->execute('endpoint');
    }

    public function testSuccessResponse(): void
    {
        $connection = $this->createConnection([
            new Response(200, [], '{"result":[{"hotel_id":10004}]}'),
        ], $container);
        $this->assertEquals([['hotel_id' => 10004]], $connection->execute('endpoint'));
    }

    /**
     * @param array $responses
     * @param       $container
     * @return \BookingCom\Connection
     */
    private function createConnection(array $responses, array &$container = null): \BookingCom\Connection
    {
        $container = $container ?? [];

        $mock = new MockHandler($responses);

        $stack = HandlerStack::create($mock);

        $stack->push(Middleware::history($container));

        $client = new Client(['handler' => $stack]);
        return new \BookingCom\Connection('login', 'password', $client);
    }

}