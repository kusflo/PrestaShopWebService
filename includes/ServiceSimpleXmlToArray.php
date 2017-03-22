<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class ServiceSimpleXmlToArray
{
    public static function take($xmlObject)
    {
        $service = new self($xmlObject);
        return $service->xmlToArray($xmlObject);
    }

    public static function takeMultiple($xmlObjects)
    {
        foreach ($xmlObjects as $obj) {
            $array[] = self::take($obj);
        }
        return $array;
    }

    private function __construct($xmlObject)
    {
        if (!is_a($xmlObject, \SimpleXMLElement::class)) {
            throw new PShopWsException('The service ' . __CLASS__ . ' has received a parameter other than SimpleXmlElement');
        }
    }

    private function xmlToArray($xmlObject, $out = array())
    {
        foreach ((array)$xmlObject as $index => $node) {
            $out[$index] = (is_object($node)) ? $this->xmlToArray($node) : $node;
        }
        return $out;
    }
}