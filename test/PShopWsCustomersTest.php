<?php

namespace phshopws;

use pshopws\PShopWsException;
use pshopws\PShopWsCustomers;
use pshopws\PShopWsCustomersTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @property PShopWsCustomersTestClass $ps
 */
class PShopWsCustomersTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsCustomers(null, null);
        $this->assertInstanceOf(PShopWsCustomers::class, $ps);
    }

    public function testGetByIdBadRequest()
    {
        $ps = new PShopWsCustomers(null, null);
        $this->expectException(PShopWsException::class);
        $ps->getById(null);
    }

    public function testGetById()
    {
        $ps = new PShopWsCustomersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    public function testGetList()
    {
        $ps = new PShopWsCustomersTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
