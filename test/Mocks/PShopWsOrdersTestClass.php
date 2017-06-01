<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Test\Mocks;

use PshopWs\Entities\PShopWsOrders;

class PShopWsOrdersTestClass extends PShopWsOrders
{
    protected function get($options = null)
    {
        if (isset($options['id'])) {
            $sXml = new \SimpleXMLElement(
                '<xml><order><id>1</id></order></xml>'
            );
        } else {
            $options['display'] = 'full';
            $sXml = new \SimpleXMLElement(
                '<xml><orders><order><id>1</id></order></orders></xml>'
            );
        }

        return $sXml;
    }

    protected function addCustomerDataToOrders($orders)
    {
        foreach ($orders as $order) {
            $ordersData [] = $this->addCustomerDataToOrder($order);
        }

        return $ordersData;
    }

    protected function addCustomerDataToOrder($order)
    {
        $order ['customer_data'] = array('id' => 1);

        return $order;
    }
}