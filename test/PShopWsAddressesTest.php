<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use PshopWs\Entities\PShopWsAddresses;
use PshopWs\Test\Mocks\PShopWsAddressesTestClass;
use PshopWs\Exceptions\PShopWsException;

class PShopWsAddressesTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsAddressesTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsAddressesTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsAddresses(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsAddressesTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }
}
