<?php
namespace pshopws;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
abstract class PShopWs
{
    const _VERSION_MIN = '1.7.0.0';
    const _VERSION_MAX = '1.7.1.0';
    const _CONFIG_FILE = 'config.inc.php';
    private $url;
    private $key;
    private $debug;
    private $version;

    protected function __construct()
    {
        require_once __DIR__ . '/../' . self::_CONFIG_FILE;
        $this->checkExtensionCurl();
        $this->url = _PS_SHOP_PATH;
        $this->key = _PS_WS_AUTH_KEY;
        $this->debug = _DEBUG;
        $this->version = 'unknown';
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getApiPermissions()
    {
        return $this->get();
    }

    protected function get($options = null)
    {
        $url = $this->getValidUrl($options);
        $response = $this->executeRequest($url, array(CURLOPT_CUSTOMREQUEST => 'GET'));
        $this->checkStatusCode($response['statusCode']);
        return $this->parseXML($response['response']);
    }

    private function printDebug($title, $content)
    {
        echo '<div style="display:table;background:#CCC;font-size:8pt;padding:7px"><h6 style="font-size:9pt;margin:0">' . $title . '</h6><pre>' . htmlentities($content) . '</pre></div>';
    }

    /**
     * @param $url
     * @param array $curlParams
     * @return array
     */
    private function executeRequest($url, $curlParams = array())
    {
        $defaultParams = $this->getDefaultParamsRequest();
        $curl_options = $this->mergeParamsRequest($curlParams, $defaultParams);
        $session = curl_init($url);
        curl_setopt_array($session, $curl_options);
        $response = curl_exec($session);
        $this->checkValidResponse($curlParams, $response);
        $body = $this->getBodyResponse($response);
        $header = $this->getHeaderResponse($response);
        $headerArray = $this->getHeaderArrayResponse($header);
        $this->checkValidVersion($headerArray);
        if ($this->debug) {
            $this->printHeadersDebug($session, $header);
        }
        $statusCode = $this->getStatusCodeResponse($session);
        $this->checkValidStatusCodeResponse($statusCode, $session);
        curl_close($session);
        if ($this->debug) {
            $this->printBodyDebug($curlParams, $body);
        }
        return array('statusCode' => $statusCode, 'response' => $body, 'header' => $header);
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
                throw new PShopWsException('HTTP XML response is not parsable: ' . $msg);
            }
            return $xml;
        } else {
            throw new PShopWsException('HTTP response is empty');
        }
    }

    /**
     * @param $statusCode
     * @throws PShopWsException
     */
    private function checkStatusCode($statusCode)
    {
        $error_label = 'This call to PrestaShop Web Services failed and returned an HTTP status of %d. That means: %s.';
        switch ($statusCode) {
            case 200:
            case 201:
                break;
            case 204:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'No content'));
                break;
            case 400:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'Bad Request'));
                break;
            case 401:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'Unauthorized'));
                break;
            case 404:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'Not Found'));
                break;
            case 405:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'Method Not Allowed'));
                break;
            case 500:
                throw new PShopWsException(sprintf($error_label, $statusCode, 'Internal Server Error'));
                break;
            default:
                throw new PShopWsException('This call to PrestaShop Web Services returned an unexpected HTTP status of:' . $statusCode);
        }
    }

    /**
     * @throws PShopWsException
     */
    private function checkExtensionCurl()
    {
        if (!extension_loaded('curl')) {
            throw new PShopWsException('Please activate the PHP extension \'curl\'');
        }
    }

    /**
     * @return array
     */
    private function getDefaultParamsRequest()
    {
        $defaultParams = array(
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLINFO_HEADER_OUT => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->key . ':',
            CURLOPT_HTTPHEADER => array('Expect:')
        );
        return $defaultParams;
    }

    /**
     * @param $curl_params
     * @param $defaultParams
     * @return array
     */
    private function mergeParamsRequest($curl_params, $defaultParams)
    {
        $curl_options = array();
        foreach ($defaultParams as $defkey => $defval) {
            if (isset($curl_params[$defkey])) {
                $curl_options[$defkey] = $curl_params[$defkey];
            } else {
                $curl_options[$defkey] = $defaultParams[$defkey];
            }
        }
        foreach ($curl_params as $defkey => $defval) {
            if (!isset($curl_options[$defkey])) {
                $curl_options[$defkey] = $curl_params[$defkey];
            }
        }
        return $curl_options;
    }

    /**
     * @param $curlParams
     * @param $response
     * @throws PShopWsException
     */
    private function checkValidResponse($curlParams, $response)
    {
        $index = strpos($response, "\r\n\r\n");
        if ($index === false && $curlParams[CURLOPT_CUSTOMREQUEST] != 'HEAD') {
            throw new PShopWsException('Bad HTTP response');
        }
    }

    /**
     * @param $response
     * @return string
     */
    private function getHeaderResponse($response)
    {
        $header = substr($response, 0, strpos($response, "\r\n\r\n"));
        return $header;
    }

    /**
     * @param $response
     * @return string
     */
    private function getBodyResponse($response)
    {
        $body = substr($response, strpos($response, "\r\n\r\n") + 4);
        return $body;
    }

    /**
     * @param $header
     * @return array
     */
    private function getHeaderArrayResponse($header)
    {
        $headerArrayTmp = explode("\n", $header);
        $headerArray = array();
        foreach ($headerArrayTmp as &$headerItem) {
            $tmp = explode(':', $headerItem);
            $tmp = array_map('trim', $tmp);
            if (count($tmp) == 2) {
                $headerArray[$tmp[0]] = $tmp[1];
            }
        }
        return $headerArray;
    }

    /**
     * @param $headerArray
     * @throws PShopWsException
     */
    private function checkValidVersion($headerArray)
    {
        if (array_key_exists('PSWS-Version', $headerArray)) {
            $this->version = $headerArray['PSWS-Version'];
            if (
                version_compare(self::_VERSION_MIN, $headerArray['PSWS-Version']) == 1 ||
                version_compare(self::_VERSION_MAX, $headerArray['PSWS-Version']) == -1
            ) {
                throw new PShopWsException('This library is not compatible with this version of PrestaShop. Please upgrade/downgrade this library');
            }
        }
    }

    /**
     * @param $session
     * @return mixed
     */
    private function getStatusCodeResponse($session)
    {
        $statusCode = curl_getinfo($session, CURLINFO_HTTP_CODE);
        return $statusCode;
    }

    /**
     * @param $statusCode
     * @param $session
     * @throws PShopWsException
     */
    private function checkValidStatusCodeResponse($statusCode, $session)
    {
        if ($statusCode === 0) {
            throw new PShopWsException('CURL Error: ' . curl_error($session));
        }
    }

    /**
     * @param $session
     * @param $header
     */
    private function printHeadersDebug($session, $header)
    {
        $this->printDebug('HTTP REQUEST HEADER', curl_getinfo($session, CURLINFO_HEADER_OUT));
        $this->printDebug('HTTP RESPONSE HEADER', $header);
    }

    /**
     * @param $curlParams
     * @param $body
     */
    private function printBodyDebug($curlParams, $body)
    {
        if ($curlParams[CURLOPT_CUSTOMREQUEST] == 'PUT' || $curlParams[CURLOPT_CUSTOMREQUEST] == 'POST') {
            $this->printDebug('XML SENT', urldecode($curlParams[CURLOPT_POSTFIELDS]));
        }
        if ($curlParams[CURLOPT_CUSTOMREQUEST] != 'DELETE' && $curlParams[CURLOPT_CUSTOMREQUEST] != 'HEAD') {
            $this->printDebug('RETURN HTTP BODY', $body);
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
            $url = $this->url . '/api/' . $options['resource'];
            $url_params = array();
            if (isset($options['id'])) {
                $url .= '/' . $options['id'];
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
                $url .= '?' . http_build_query($url_params);
                $url = urldecode($url);
            }
        } else {
            $url = $this->url . '/api/';
        }
        return $url;
    }
}
