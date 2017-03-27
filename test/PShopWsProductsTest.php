<?php

namespace phshopws;

use pshopws\PShopWsException;
use pshopws\PShopWsProducts;
use pshopws\PShopWsProductsTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @property PShopWsProductsTestClass $ps
 */
class PShopWsProductsTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsProducts(null, null);
        $this->assertInstanceOf(PShopWsProducts::class, $ps);
    }

    public function testGetByIdBadRequest()
    {
        $ps = new PShopWsProducts(null, null);
        $this->expectException(PShopWsException::class);
        $ps->getById(null);
    }

    public function testGetById()
    {
        $ps = new PShopWsProductsTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    public function testGetList()
    {
        $ps = new PShopWsProductsTestClass(null, null);
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
