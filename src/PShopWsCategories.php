<?php

namespace pshopws;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsCategories extends PShopWs
{
    public function __construct($url, $key, $debug = false)
    {
        parent::__construct($url, $key, $debug);
    }

    public function getList()
    {
        $options['resource'] = 'categories';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->categories->category);
    }

    public function getById($id)
    {
        $options['resource'] = 'categories';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->category);
    }
}