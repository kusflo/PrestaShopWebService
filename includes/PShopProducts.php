<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopProducts extends PShopWebService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        return ServiceSimpleXmlToArray::takeMultiple($this->requestProducts());
    }

    public function getById($id)
    {
        return ServiceSimpleXmlToArray::take($this->requestProduct($id));
    }

    private function requestProducts()
    {
        $opt['resource'] = 'products';
        $opt['display'] = 'full';
        $objects = $this->get($opt);
        return $objects->products->product;
    }

    private function requestProduct($id)
    {
        $opt['resource'] = 'products';
        $opt['id'] = $id;
        $objects = $this->get($opt);
        return $objects->product;
    }
}