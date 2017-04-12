
# PrestashopWebService Easy
PHP wrapper for PrestaShop Webservices 1.7.x and 1.6.x 

[![Build Status](https://travis-ci.org/kusflo/PrestaShopWebService.svg?branch=master)](https://travis-ci.org/kusflo/PrestaShopWebService)
[![Latest Stable Version](https://poser.pugx.org/kusflo/prestashop-webservice/v/stable)](https://packagist.org/packages/kusflo/prestashop-webservice)
[![Total Downloads](https://poser.pugx.org/kusflo/prestashop-webservice/downloads)](https://packagist.org/packages/kusflo/prestashop-webservice)
[![License](https://poser.pugx.org/kusflo/prestashop-webservice/license)](https://packagist.org/packages/kusflo/prestashop-webservice)

# Description
This wrapper allows you to download data from the prestashop store in a simple way. 
The data is transformed to an associative array.

# Installation
composer require kusflo/prestashop-webservice

# Example Usage

```
function listOrdersAll()
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $orders = $o->getList();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listOrdersLastDays($days)
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $orders = $o->getListLastDays($days);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listOrdersToday()
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $orders = $o->getListToday();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function getOrderById($id)
{
    try {
        $o = new PShopWsOrders(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $order = $o->getById($id);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listProducts()
{
    try {
        $p = new PShopWsProducts(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $products = $p->getList();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function getProductById($id)
{
    try {
        $p = new PShopWsProducts(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $product = $p->getById($id);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listCategories()
{
    try {
        $p = new PShopWsCategories(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $categories = $p->getList();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function getCategoryById($id)
{
    try {
        $p = new PShopWsCategories(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $category = $p->getById($id);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listManufacturers()
{
    try {
        $p = new PShopWsManufacturers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $manufacturers = $p->getList();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function getManufacturerById($id)
{
    try {
        $p = new PShopWsManufacturers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $manufacturer = $p->getById($id);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function listCustomers()
{
    try {
        $c = new PShopWsCustomers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $customers = $c->getList();
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
function getCustomerById($id)
{
    try {
        $c = new PShopWsCustomers(_PS_SHOP_PATH, _PS_WS_AUTH_KEY);
        $customer = $c->getById($id);
    } catch (PShopWsException $e) {
        echo $e->getMessage();
    }
}
```
```
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
```


