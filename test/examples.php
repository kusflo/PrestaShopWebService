<?php

namespace pshopws;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
require '../vendor/autoload.php';
/*** Connection Data ****/
define('_PS_SHOP_PATH', "http://dev.vigilabebes.com");
define('_PS_WS_AUTH_KEY', "1IWKHF7L5N7HDD1YJS5PSDMM7CZP67XF");
/**** Examples Products ***/
//listProductsToArray();
//getProductById(1);
/**** Examples Categories ***/
//listCategoriesToArray();
//getCategoryById(1);
/**** Examples Manufactures ***/
//listManufacturersToArray();
//getManufacturerById(1);
/**** Examples Orders ***/
//listOrdersToArray();
//listOrdersLastDaysToArray(50);
//listOrdersToday();
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
        $p = new PShopWsProducts(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
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
        $p = new PShopWsProducts(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $product = $p->getById($id);
        echo '<pre>';
        var_dump($product);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listCategoriesToArray()
{
    try {
        $p = new PShopWsCategories(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $categories = $p->getList();
        echo '<pre>';
        var_dump($categories);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getCategoryById($id)
{
    try {
        $p = new PShopWsCategories(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $category = $p->getById($id);
        echo '<pre>';
        var_dump($category);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listManufacturersToArray()
{
    try {
        $p = new PShopWsManufacturers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $manufacturers = $p->getList();
        echo '<pre>';
        var_dump($manufacturers);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getManufacturerById($id)
{
    try {
        $p = new PShopWsManufacturers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $manufacturer = $p->getById($id);
        echo '<pre>';
        var_dump($manufacturer);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listOrdersToArray()
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
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
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $orders = $o->getListLastDays($days);
        echo '<pre>';
        var_dump($orders);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function listOrdersToday()
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $orders = $o->getListToday();
        echo '<pre>';
        var_dump($orders);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}

function getOrderByIdToArray($id)
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
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
        $c = new PShopWsCustomers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
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
        $c = new PShopWsCustomers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
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
        $c = new PShopWsCustomers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $permissions = $c->getApiPermissions();
        echo '<pre>';
        var_dump($permissions);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}


