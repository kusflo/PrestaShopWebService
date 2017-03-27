<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace pshopws;

class PShopWsProductsTestClass extends PShopWsProducts
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xm><product><id>1</id></product></xm>');
        } else {
            $sXml = new \SimpleXMLElement('<xm><products><product><id>1</id></product></products></xm>');
        }

        return $sXml;
    }
}