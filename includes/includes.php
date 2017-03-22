<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
function autoloadClasses($name)
{
    $file = dirname(__FILE__) . '/' . $name . '.php';
    if (file_exists($file)) {
        include($file);
    }
}

spl_autoload_register('autoloadClasses');



