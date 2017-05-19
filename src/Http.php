<?php

namespace Esewa;

/**
 * HTTP Client
 * processes Http requests using curl
 */
class Http
{

    public function createPayment($url, array $requestBody = [])
    {
        $request = array_replace_recursive([
            'txAmt' => 0,
            'psc' => 0,
            'pdc' => 0,
            'scd' => getenv('ESEWA_MERCHANT_ID'),
            ], $requestBody);

        $query = http_build_query($request);
        header("Location: {$url}?" . $query);
        exit();
    }
}
class_alias('Esewa\Http', 'Esewa_Http');
