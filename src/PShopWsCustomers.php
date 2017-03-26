<?php

namespace pshopws;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsCustomers extends PShopWs
{
    public function __construct($url, $key, $debug)
    {
        parent::__construct($url, $key, $debug);
    }

    /**
     * @param $id int
     * @return array
     */
    public function getById($id)
    {
        $options['resource'] = 'customers';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->customer);
    }

    /**
     * @return array
     */
    public function getList()
    {
        $options['resource'] = 'customers';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->customers->customer);
    }
}