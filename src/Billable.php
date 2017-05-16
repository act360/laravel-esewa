<?php

namespace Esewa;

use Esewa\Exception\Esewa_Unexpected;
use Esewa\Http as Esewa_Http;
use Esewa\HttpConfig;

trait Billable
{
    protected $url;
    /**
     * Create a payment request on esewa.
     *
     * @param  Http   $http
     * @param  string $httpVerb
     * @param  array $requests
     * @return Response
     */
    public function charge($requests = null)
    {
        $url = getenv('ESEWA_TRANSACTION_URL')?:'https://www.esewa.com.np/main/';
        try {
            (new Esewa_Http())->createPayment($url, $requests);
        } catch (Esewa_Unexpected $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
