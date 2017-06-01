<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsAddresses extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getById($id)
    {
        $options['resource'] = "addresses";
        $options['id'] = $id;
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::take($objects->address);
    }
}