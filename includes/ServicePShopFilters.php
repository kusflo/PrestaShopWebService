<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class ServicePShopFilters
{
    public static function byDay($day)
    {
        return "[" . $day . "]%&date=1";
    }

    private function __construct($xmlObject)
    {
    }
}