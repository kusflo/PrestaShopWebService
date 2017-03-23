<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
require_once '../autoload.php';
/**** Examples Products ***/
//listProductsToArray();
//getProductById(1);
/**** Examples Orders ***/
//listOrdersToArray();
//listOrdersLastDaysToArray(7);
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
        $p = new PShopWsProducts();
        $products = $p->getList();
        echo '<pre>';
        var_dump($products);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getProductById($id)
{
    try {
        $p = new PShopWsProducts();
        $product = $p->getById($id);
        echo '<pre>';
        var_dump($product);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listOrdersToArray()
{
    try {
        $o = new PShopWsOrders();
        $orders = $o->getList();
        echo '<pre>';
        var_dump($orders);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listOrdersLastDaysToArray($days)
{
    try {
        $o = new PShopWsOrders();
        $orders = $o->getListLastDays($days);
        echo '<pre>';
        var_dump($orders);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getOrderByIdToArray($id)
{
    try {
        $o = new PShopWsOrders();
        $order = $o->getById($id);
        echo '<pre>';
        var_dump($order);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listCustomersToArray()
{
    try {
        $c = new PShopWsCustomers();
        $customers = $c->getList();
        echo '<pre>';
        var_dump($customers);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getCustomerByIdToArray($id)
{
    try {
        $c = new PShopWsCustomers();
        $customer = $c->getById($id);
        echo '<pre>';
        var_dump($customer);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listApiPermissionsToXml()
{
    try {
        $c = new PShopWsCustomers();
        $permissions = $c->getApiPermissions();
        echo '<pre>';
        var_dump($permissions);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}


