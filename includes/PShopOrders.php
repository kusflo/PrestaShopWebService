<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopOrders extends PShopWebService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        return ServiceSimpleXmlToArray::takeMultiple($this->requestOrders());
    }

    public function getById($id)
    {
        return ServiceSimpleXmlToArray::take($this->requestOrder($id));
    }

    private function requestOrders()
    {
        $opt['resource'] = 'orders';
        $opt['display'] = 'full';
        $objects = $this->get($opt);
        return $objects->orders->order;
    }

    private function requestOrder($id)
    {
        $opt['resource'] = 'orders';
        $opt['id'] = $id;
        $objects = $this->get($opt);
        return $objects->order;
    }
}