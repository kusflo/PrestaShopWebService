<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsAddresses;

class PShopWsAddressesTestClass extends PShopWsAddresses
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xml><address><id>1</id></address></xml>');
        }

        return $sXml;
    }
}