<?php


class Response
{
    public function __construct(string $type, array $data = [], string $message = '')
    {
        switch ($type)
        {
            case Constants::TYPE_JSON:
                return new JsonResponse($data);
            case Constants::TYPE_XML:
                return new XMLResponse($data);
            case Constants::TYPE_ERROR:
                return new ErrorResponse($message);
            default:
                return null;
        }
    }
}