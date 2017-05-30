<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use PshopWs\Entities\PShopWsCategories;
use PshopWs\Test\Mocks\PShopWsCategoriesTestClass;
use PshopWs\Exceptions\PShopWsException;

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
