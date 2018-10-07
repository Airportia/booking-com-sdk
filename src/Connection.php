<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 05.10.18
 */

namespace BookingCom;

class Connection
{
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Connection constructor.
     * @param string             $login
     * @param string             $password
     * @param \GuzzleHttp\Client $client
     */
    private const API_URL = 'https://distribution-xml.booking.com/2.2';

    public function __construct(string $login, string $password, \GuzzleHttp\Client $client = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->client = $client ?? $this->createClient();
    }

    public function execute(string $uri, array $params = [])
    {
        try {
            $options = $this->getOptions($params);
            $response = $this->getClient()->get($uri, $options);
            $this->checkResponse($response);
            return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\TransferException $e) {
            throw new ConnectionException($e->getMessage());
        }
    }

    private function getClient()
    {
        return $this->client;
    }

    private function createClient()
    {
        return new \GuzzleHttp\Client(['base_url' => self::API_URL]);
    }

    private function getOptions(array $params)
    {
        return [
            'query' => $params,
            'auth' => [$this->login, $this->password],
            'http_errors' => false,
        ];
    }

    private function checkResponse(\Psr\Http\Message\ResponseInterface $response): void
    {
        if ($response->getStatusCode() !== 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $message = $body['errors']['message'] ?? 'Bad response';
            $code = $body['errors']['code'] ?? $response->getStatusCode();
            throw new ConnectionException($message, $code);
        }
    }
}
