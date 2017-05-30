<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsCategories;

class PShopWsCategoriesTestClass extends PShopWsCategories
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xml><category><id>1</id></category></xml>');
        } else {
            $sXml = new \SimpleXMLElement('<xml><categories><category><id>1</id></category></categories></xml>');
        }

        return $sXml;
    }
}