<?php


class JsonResponse
{
    private string $jsonObject;

    public function __construct(array $data = [])
    {
        $this->jsonObject = json_encode($data, JSON_PRETTY_PRINT);
    }

    public function __destruct()
    {
        echo $this->jsonObject;
    }
}