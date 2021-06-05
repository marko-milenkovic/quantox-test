<?php


class XMLResponse
{
    private $xmlObject;

    public function __construct(array $data = [])
    {
        $xml = new SimpleXMLElement('<root/>');
        $data = array_flip($data);
        array_walk_recursive($data, [$xml, 'addChild']);
        $this->xmlObject = $xml->asXML();
    }

    public function __destruct()
    {
        echo $this->xmlObject;
    }
}