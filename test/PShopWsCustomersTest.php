<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use Pshopws\Entities\PShopWsCustomers;
use PshopWs\Test\Mocks\PShopWsCustomersTestClass;
use Pshopws\Exceptions\PShopWsException;

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
