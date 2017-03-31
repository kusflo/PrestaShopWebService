<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace pshopws;

class PShopWsOrdersTestClass extends PShopWsOrders
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xm><order><id>1</id></order></xm>');
        } else {
            $options['display'] = 'full';
            $sXml = new \SimpleXMLElement('<xm><orders><order><id>1</id></order></orders></xm>');
        }

        return $sXml;
    }

}