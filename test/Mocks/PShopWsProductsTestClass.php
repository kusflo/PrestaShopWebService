<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsProducts;

class PShopWsProductsTestClass extends PShopWsProducts
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xml><product><id>1</id></product></xml>');
        } else {
            $sXml = new \SimpleXMLElement('<xml><products><product><id>1</id></product></products></xml>');
        }

        return $sXml;
    }
}