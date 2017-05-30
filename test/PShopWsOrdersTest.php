<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use PshopWs\Entities\PShopWsOrders;
use PshopWs\Test\Mocks\PShopWsOrdersTestClass;
use PshopWs\Exceptions\PShopWsException;

class PShopWsOrdersTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsOrdersTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsOrdersTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsOrders(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetListLastDays($ps)
    {
        $this->assertArrayHasKey("id", $ps->getListLastDays()[0]);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetListToday($ps)
    {
        $this->assertArrayHasKey("id", $ps->getListToday()[0]);
    }
}
