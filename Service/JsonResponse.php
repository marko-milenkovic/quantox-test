<?php


class JsonResponse
{
    private array $jsonObject;

    public function __construct(bool $success, string $message, array $data = [], int $statusCode = 200)
    {
        $this->jsonObject = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
            'statusCode' => $statusCode,
        ];
    }

    public function __destruct()
    {
        echo json_encode($this->jsonObject, JSON_PRETTY_PRINT);
    }
}