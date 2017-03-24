<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsProductsTest extends \PHPUnit_Framework_TestCase
{
    public function testPShopWsProductsCanBeInstantiated()
    {
        $ps = new pshopws\PShopWsProducts();
        $this->assertInstanceOf('pshopws\PShopWsProducts', $ps);
    }
}
