<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
require_once '../autoload.php';
/**** Examples ***/
//listCustomersToArray();
//getCustomerByIdToArray(1);
//listApiPermissions();
/*****************/
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

function listApiPermissions()
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


