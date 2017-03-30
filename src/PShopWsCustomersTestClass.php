<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace pshopws;

class PShopWsCustomersTestClass extends PShopWsCustomers
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xm><customer><id>1</id></customer></xm>');
        } else {
            $options['display'] = 'full';
            $sXml = new \SimpleXMLElement('<xm><customers><customer><id>1</id></customer></customers></xm>');
        }

        return $sXml;
    }
}