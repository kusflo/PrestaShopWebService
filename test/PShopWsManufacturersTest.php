<?php

namespace phshopws;

use PHPUnit_Framework_TestCase;
use pshopws\PShopWsManufacturers;
use pshopws\PShopWsManufacturersTestClass;
use pshopws\PShopWsException;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @cover PShopWsManufactures
 */
class PShopWsManufacturersTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsManufacturersTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsManufacturersTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsManufacturers(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsManufacturersTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsManufacturersTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
