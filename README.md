# PrestashopWebService 1.7.x
PHP library (not official) for PrestaShop 1.7.x Webservices.

Write the webservice parameters of your store in the file config.inc_default.php and rename it to config.inc.php

# Description
This library allows you to download data from the prestashop store in a simple way. 
The data is transformed to an associative array.

# Installation
composer require kusflo/prestashop-webservice dev-master

# List of Published Functions
For more details see the test folder:

#Orders
- List Orders to array.
- **List filtered orders by recent date**
- Get Order by id to array.

#Products
- List Products to array.
- Get Products by id to array.

#Customers
- List Customers to array.
- Get Customer by id to array.
#Api
- List Api Permissions
