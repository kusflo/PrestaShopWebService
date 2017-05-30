<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsManufacturers;

class PShopWsManufacturersTestClass extends PShopWsManufacturers
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xml><manufacturer><id>1</id></manufacturer></xml>');
        } else {
            $sXml = new \SimpleXMLElement(
                '<xml><manufacturers><manufacturer><id>1</id></manufacturer></manufacturers></xml>'
            );
        }

        return $sXml;
    }
}