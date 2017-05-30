<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test;

use PHPUnit_Framework_TestCase;
use Pshopws\Entities\PShopWsManufacturers;
use PshopWs\Test\Mocks\PShopWsManufacturersTestClass;
use Pshopws\Exceptions\PShopWsException;

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
