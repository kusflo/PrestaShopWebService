<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopCustomers extends PShopWebService
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
        $ids = $this->requestAllIdCustomers();
        foreach ($ids as $id) {
            $objects[] = $this->requestCustomer($id);
        }
        return $this->arrayFormatCustomers($objects);
    }

    /**
     * @param $id int
     * @return array
     */
    public function getById($id)
    {
        $object = $this->requestCustomer($id);
        return $this->arrayFormatCustomer($object);
    }

    private function arrayFormatCustomers($objects)
    {
        foreach ($objects as $obj) {
            $array[] = $this->arrayFormatCustomer($obj);
        }
        return $array;
    }

    /**
     * @param $object
     * @return array
     */
    private function arrayFormatCustomer($object)
    {
        return ServiceSimpleXmlToArray::take($object);
    }

    private function requestCustomer($id)
    {
        $opt['resource'] = 'customers';
        $opt['id'] = $id;
        $object = $this->get($opt);
        $this->checkNotEmpty($object);
        return $object->customer;
    }

    private function requestAllIdCustomers()
    {
        $opt['resource'] = 'customers';
        $objects = $this->get($opt);
        $this->checkNotEmpty($objects);
        return $this->getIdsFromObjects($objects);
    }

    /**
     * @param $objs [] \SimpleXMLElement
     * @return $ids []
     */
    private function getIdsFromObjects($objects)
    {
        foreach ($objects->customers->customer as $customer) {
            $ids[] = (string)$customer['id'];
        }
        return $ids;
    }

    private function checkNotEmpty($objects)
    {
        if (!is_object($objects[0])) {
            throw new PShopWebServiceException('This call does not return customers');
        }
    }
}