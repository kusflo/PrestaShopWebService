<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsCustomers extends PShopWs
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getList()
    {
        return ServiceSimpleXmlToArray::takeMultiple($this->requestAllCustomers());
    }

    /**
     * @param $id int
     * @return array
     */
    public function getById($id)
    {
        $object = $this->requestCustomer($id);
        return ServiceSimpleXmlToArray::take($object->customer);
    }

    private function requestCustomer($id)
    {
        $opt['resource'] = 'customers';
        $opt['id'] = $id;
        $object = $this->get($opt);
        return $object;
    }

    private function requestAllCustomers()
    {
        $opt['resource'] = 'customers';
        $opt['display'] = 'full';
        $objects = $this->get($opt);
        return $objects->customers->customer;
    }
}