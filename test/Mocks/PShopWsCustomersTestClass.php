<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsCustomers;

class PShopWsCustomersTestClass extends PShopWsCustomers
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xml><customer><id>1</id></customer></xml>');
        } else {
            $options['display'] = 'full';
            $sXml = new \SimpleXMLElement('<xml><customers><customer><id>1</id></customer></customers></xml>');
        }

        return $sXml;
    }
}