<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace pshopws;

class PShopWsCategoriesTestClass extends PShopWsCategories
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement('<xm><category><id>1</id></category></xm>');
        } else {
            $sXml = new \SimpleXMLElement('<xm><categories><category><id>1</id></category></categories></xm>');
        }

        return $sXml;
    }
}