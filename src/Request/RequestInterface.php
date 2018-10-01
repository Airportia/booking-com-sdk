<?php

namespace BookingSDK\Request;


interface RequestInterface
{
    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return array
     */
    public function getParams(): array;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getResourceClass(): string;
}