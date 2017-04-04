<?php

namespace pshopws;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsManufacturers extends PShopWs
{
    public function __construct($url, $key, $debug = false)
    {
        parent::__construct($url, $key, $debug);
    }

    public function getList()
    {
        $options['resource'] = 'manufacturers';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->manufacturers->manufacturer);
    }

    public function getById($id)
    {
        $options['resource'] = 'manufacturers';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->manufacturer);
    }
}