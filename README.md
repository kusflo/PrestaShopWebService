
# PrestashopWebService 1.7.x
PHP library (not official) for PrestaShop 1.7.x Webservices.

[![Build Status](https://travis-ci.org/kusflo/PrestaShopWebService.svg?branch=master)](https://travis-ci.org/kusflo/PrestaShopWebService)
[![Latest Stable Version](https://poser.pugx.org/kusflo/prestashop-webservice/v/stable)](https://packagist.org/packages/kusflo/prestashop-webservice)
[![Total Downloads](https://poser.pugx.org/kusflo/prestashop-webservice/downloads)](https://packagist.org/packages/kusflo/prestashop-webservice)
[![License](https://poser.pugx.org/kusflo/prestashop-webservice/license)](https://packagist.org/packages/kusflo/prestashop-webservice)

# Description
This library allows you to download data from the prestashop store in a simple way. 
The data is transformed to an associative array.

# Installation
composer require kusflo/prestashop-webservice dev-master

# List of Published Functions
For more details see the test folder:

Orders
- List Orders to array.
- **List filtered orders by recent date**
- **List filtered orders of today**
- Get Order by id to array.

Products
- List Products to array.
- Get Products by id to array.

Customers
- List Customers to array.
- Get Customer by id to array.

Api
- List Api Permissions
