<?php

namespace Esewa;

/**
 * HTTP Client
 * processes Http requests using curl
 */
class Http
{
    protected $_config;

    public function __construct($config)
    {
        $this->_config = $config;
    }

    private function _getHeaders()
    {
        return [
            'Accept: application/xml',
            'Content-Type: application/xml',
        ];
    }

    private function _doRequest($httpVerb, $path, $requestBody = null)
    {
        return $this->_doUrlRequest($httpVerb, $this->_config->baseUrl() . $path, $requestBody);
    }

    public function _doUrlRequest($httpVerb, $url, $requestBody = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $httpVerb);
        curl_setopt($curl, CURLOPT_URL, $url);
        
        if (!empty($requestBody)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error_code = curl_errno($curl);
        $error = curl_error($curl);
        if ($httpStatus == 0) {
            throw new Exception\Timeout();
        }
        curl_close($curl);
        if ($error_code) {
            throw new Exception\Connection($error, $error_code);
        }
        return ['status' => $httpStatus, 'body' => $response];
    }
}
class_alias('Esewa\Http', 'Esewa_Http');
