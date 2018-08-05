<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServicePShopFilters;
use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsOrders extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getById($id)
    {
        $options['resource'] = "orders";
        $options['id'] = $id;
        $objects = $this->get($options);

        return $this->addAssociation(ServiceSimpleXmlToArray::take($objects->order));
    }

    public function getList()
    {
        $options['resource'] = "orders";
        $options['display'] = "full";

        return $this->getOrders($options);
    }

    public function getListLastDays($days = 7)
    {
        $orders = array();
        $days = $this->getLastDays($days);
        foreach ($days as $day) {
            $result = $this->getListByDay($day);
            if ($result) {
                $orders = array_merge($orders, $result);
            }
        }

        return $orders;
    }

    public function getListToday()
    {
        return $this->getListByDay($this->getDateTimeNow()->format('Y-m-d'));
    }

    private function getListByDay($day)
    {
        $options['resource'] = "orders";
        $options['display'] = "full";
        $options['filter[date_add]'] = ServicePShopFilters::byDay($day);

        return $this->getOrders($options);
    }

    private function getLastDays($days)
    {
        $array = array();
        for ($i = 0; $i < $days; $i++) {
            $array[] = $this->getDateTimeNow()
                ->sub(new \DateInterval("P".$i."D"))->format('Y-m-d');
        }

        return $array;
    }

    /**
     * @param $options
     * @return array
     */
    private function getOrders($options)
    {
        $objects = $this->get($options);

        return $this->addAssociations(ServiceSimpleXmlToArray::takeMultiple($objects->orders->order));
    }

    protected function addAssociations($orders)
    {
        $ordersData = array();
        foreach ($orders as $order) {
            $ordersData [] = $this->addAssociation($order);
        }

        return $ordersData;
    }

    protected function addAssociation($order)
    {
        $order = $this->addCustomerDataToOrder($order);
        $order = $this->addAddressDataToOrder($order);

        return $order;
    }

    protected function addCustomerDataToOrder($order)
    {
        $psCustomers = new PShopWsCustomers($this->url, $this->key);
        $order['customer_data'] = $psCustomers->getById($order['id_customer']);

        return $order;
    }

    protected function addAddressDataToOrder($order)
    {
        $psAddress = new PShopWsAddresses($this->url, $this->key);
        $order['addresses_data'] = $psAddress->getById($order['id_address_delivery']);

        return $order;
    }

    /**
     * @return \DateTime
     */
    private function getDateTimeNow()
    {
        $default_timezone = @date_default_timezone_get();

        return new \DateTime('now', new \DateTimeZone($default_timezone));
    }
}
