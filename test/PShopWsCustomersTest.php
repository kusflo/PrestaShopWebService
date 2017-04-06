<?php

namespace phshopws;

use PHPUnit_Framework_TestCase;
use pshopws\PShopWsException;
use pshopws\PShopWsCustomers;
use pshopws\PShopWsCustomersTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @covers PShopWsCustomers
 */
final class PShopWsCustomersTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsCustomersTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsCustomersTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsCustomers(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsCustomersTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsCustomersTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
