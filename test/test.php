<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
require_once '../autoload.php';
/**** Examples Products ***/
//listProductsToArray();
//getProductByIdToArray(1);
/**** Examples Orders ***/
//listOrdersToArray();
//getOrderByIdToArray(1);
/**** Examples Customers ***/
//listCustomersToArray();
//getCustomerByIdToArray(1);
/**** View api options ***/
//listApiPermissionsToXml();
/*****************/
function listProductsToArray()
{
    try {
        $p = new PShopProducts();
        $products = $p->getList();
        echo '<pre>';
        var_dump($products);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function getProductByIdToArray($id)
{
    try {
        $p = new PShopProducts();
        $product = $p->getById($id);
        echo '<pre>';
        var_dump($product);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function listOrdersToArray()
{
    try {
        $o = new PShopOrders();
        $orders = $o->getList();
        echo '<pre>';
        var_dump($orders);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function getOrderByIdToArray($id)
{
    try {
        $o = new PShopOrders();
        $order = $o->getById($id);
        echo '<pre>';
        var_dump($order);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function listCustomersToArray()
{
    try {
        $c = new PShopCustomers();
        $customers = $c->getList();
        echo '<pre>';
        var_dump($customers);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function getCustomerByIdToArray($id)
{
    try {
        $c = new PShopCustomers();
        $customer = $c->getById($id);
        echo '<pre>';
        var_dump($customer);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}

function listApiPermissionsToXml()
{
    try {
        $c = new PShopCustomers();
        $permissions = $c->getApiPermissions();
        echo '<pre>';
        var_dump($permissions);
    } catch (PShopWebServiceException $e) {
        echo $e->getMessage();
    }
}


