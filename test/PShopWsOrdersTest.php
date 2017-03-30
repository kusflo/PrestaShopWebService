<?php

namespace phshopws;

use pshopws\PShopWsException;
use pshopws\PShopWsOrders;
use pshopws\PShopWsOrdersTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @property PShopWsOrdersTestClass $ps
 */
class PShopWsOrdersTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsOrders(null, null);
        $this->assertInstanceOf(PShopWsOrders::class, $ps);
    }

    public function testGetByIdBadRequest()
    {
        $ps = new PShopWsOrders(null, null);
        $this->expectException(PShopWsException::class);
        $ps->getById(null);
    }

    public function testGetById()
    {
        $ps = new PShopWsOrdersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    public function testGetList()
    {
        $ps = new PShopWsOrdersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }

    public function testGetListLastDays()
    {
        $ps = new PShopWsOrdersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getListLastDays()[0]);
    }

    public function testGetListToday()
    {
        $ps = new PShopWsOrdersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getListToday()[0]);
    }
}
