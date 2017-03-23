<?php

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsOrders extends PShopWs
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        $options['resource'] = "orders";
        $options['id'] = $id;
        $objects = $this->get($options);
        return ServiceSimpleXmlToArray::take($objects->order);
    }

    public function getList()
    {
        $options['resource'] = "orders";
        $options['display'] = "full";
        return $this->getOrders($options);
    }

    public function getListLastDays($days = 7)
    {
        $days = $this->getLastDays($days);
        foreach ($days as $day) {
            $result = $this->getListByDay($day);
            if ($result) {
                $orders [] = $result[0];
            }
        }
        return $orders;
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
        for ($i = 0; $i < $days; $i++) {
            $array[] = (new DateTime())->sub(new DateInterval("P" . $i . "D"))->format('Y-m-d');
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
        return ServiceSimpleXmlToArray::takeMultiple($objects->orders->order);
    }
}