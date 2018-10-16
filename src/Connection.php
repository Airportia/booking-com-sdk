<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 05.10.18
 */

namespace BookingCom;

class Connection
{
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
    /**
     * @var array
     */
    private $config;

    public function __construct(array $config, \GuzzleHttp\Client $client = null)
    {
        $this->validateCredentials($config);
        $this->config = $this->setDefaults($config);
        $this->client = $client ?? $this->createClient($this->config);
    }

    public function execute(string $uri, array $params = [])
    {
        try {
            $options = $this->getRequestOptions($params);
            $response = $this->getClient()->get($uri, $options);
            $this->checkResponse($response);
            return $this->parseResponse($response->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\TransferException $e) {
            throw new ConnectionException($e->getMessage());
        }
    }

    private function getClient(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    private function createClient(array $config): \GuzzleHttp\Client
    {
        return new \GuzzleHttp\Client($config);
    }

    private function getRequestOptions(array $params): array
    {
        return [
            'query' => $params,
            'auth' => [$this->config['login'], $this->config['password']],
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

    private function parseResponse(string $json)
    {
        $array = \GuzzleHttp\json_decode($json, true);
        if (!isset($array['result'])) {
            throw new ConnectionException('Bad response format');
        }

        return $array['result'];
    }

    private function setDefaults(array $config): array
    {
        return array_merge([
            'base_uri' => self::API_URL,
            'timeout' => 5,
        ], $config);
    }

    private function validateCredentials(array $config): void
    {
        if (!isset($config['login'], $config['password'])) {
            throw new ConnectionException('Login and password are required');
        }
    }
}
