<?php

namespace BookingSDK\Request;

abstract class Request implements RequestInterface
{
    /** @var string */
    protected $path;

    /** @var array */
    protected $params = [];

    /** @var array */
    protected $headers = [];

    /** @var string */
    protected $method;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}