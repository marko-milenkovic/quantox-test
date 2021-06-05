<?php


class ErrorResponse
{
    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function __destruct()
    {
        echo $this->message;
    }
}