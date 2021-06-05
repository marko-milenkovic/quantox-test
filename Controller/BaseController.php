<?php


abstract class BaseController
{
    public function json(bool $success, string $message, array $data = [], int $statusCode = 200): JsonResponse
    {
        return new JsonResponse($success, $message, $data, $statusCode);
    }
}