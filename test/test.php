<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
require_once '../autoload.php';
/**** Examples ***/
//listOrdersToArray();
//getOrderByIdToArray(1);
//listCustomersToArray();
//getCustomerByIdToArray(1);
//listApiPermissionsToXml();
/*****************/
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


