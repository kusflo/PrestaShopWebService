<?php
/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */

namespace PshopWs\Entities;

use GuzzleHttp\Client;
use PshopWs\Exceptions\PShopWsException;

abstract class PShopWs
{
    protected $url;
    protected $key;

    protected function __construct($url, $key)
    {
        $this->checkParams($url, $key);
        $this->client = new Client();
        $this->url = $url;
        $this->key = $key;
    }

    public function getApiPermissions()
    {
        return $this->get();
    }

    protected function get($options = null)
    {
        $response = $this->client->request('GET', $this->getValidUrl($options), ['auth' => [$this->key]]);
        PShopWsException::checkStatusCode($response->getStatusCode());

        return $this->parseXML($response->getBody());
    }

    /**
     * @param $response
     * @return \SimpleXMLElement
     * @throws PShopWsException
     */
    private function parseXML($response)
    {
        if ($response != '') {
            libxml_clear_errors();
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
            if (libxml_get_errors()) {
                $msg = var_export(libxml_get_errors(), true);
                libxml_clear_errors();
                throw new PShopWsException('HTTP XML response is not parsable: '.$msg);
            }

            return $xml;
        } else {
            throw new PShopWsException('HTTP response is empty');
        }
    }

    /**
     * @param $options
     * @return string
     * @throws PShopWsException
     */
    private function getValidUrl($options)
    {
        if (isset($options['url'])) {
            $url = $options['url'];
        } elseif (isset($options['resource'])) {
            $url = $this->url.'/api/'.$options['resource'];
            $url_params = array();
            if (isset($options['id'])) {
                $url .= '/'.$options['id'];
            }
            $params = array('filter', 'display', 'sort', 'limit', 'id_shop', 'id_group_shop');
            foreach ($params as $p) {
                foreach ($options as $k => $o) {
                    if (strpos($k, $p) !== false) {
                        $url_params[$k] = $options[$k];
                    }
                }
            }
            if (count($url_params) > 0) {
                $url .= '?'.http_build_query($url_params);
                $url = urldecode($url);
            }
        } else {
            $url = $this->url.'/api/';
        }

        return $url;
    }

    protected function checkParams($url, $key)
    {
        if (!$url && !$key) {
            throw new PShopWsException("Missing Url or Key for connecting to Prestashop webservices");
        }
    }
}
