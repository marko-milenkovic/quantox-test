<?php


abstract class BaseController
{
    public function response(string $type, array $data = [], string $message = ''): Response
    {
        return new Response($type, $data, $message);
    }
}