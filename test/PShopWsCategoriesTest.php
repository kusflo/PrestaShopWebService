<?php

namespace phshopws;

use PHPUnit_Framework_TestCase;
use pshopws\PShopWsCategories;
use pshopws\PShopWsCategoriesTestClass;
use pshopws\PShopWsException;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @cover PShopWsCategories
 */
class PShopWsCategoriesTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsCategoriesTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsCategoriesTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsCategories(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsCategoriesTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsCategoriesTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
