<?php

namespace PshopWs\Exceptions;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 */
class PShopWsException extends \Exception
{
    /**
     * @param $statusCode
     * @throws PShopWsException
     */
    public static function checkStatusCode($statusCode)
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
                throw new PShopWsException(
                    'This call to PrestaShop Web Services returned an unexpected HTTP status of:'.$statusCode
                );
        }
    }
}