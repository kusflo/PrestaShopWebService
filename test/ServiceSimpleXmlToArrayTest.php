<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use PshopWs\Services\ServiceSimpleXmlToArray;
use PshopWs\Exceptions\PShopWsException;
use SimpleXMLElement;

class ServiceSimpleXmlToArrayTest extends PHPUnit_Framework_TestCase
{
    public function testTakeMethodIsNull()
    {
        $this->expectException(PShopWsException::class);
        ServiceSimpleXmlToArray::take(null);
    }

    public function testTakeMethod()
    {
        $simpleXml = new SimpleXMLElement('<xml><test>test</test></xml>');
        $this->assertTrue(is_array(ServiceSimpleXmlToArray::take($simpleXml)));
    }
}
