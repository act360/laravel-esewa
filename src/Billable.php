<?php

namespace Billable;

use Esewa\Http as Esewa_Http;

trait Billable
{
    protected $esewa_http;

    public function __construct(Esewa_Http $esewa_http)
    {
        $this->esewa_http = $esewa_http;
    }

    /**
     * Create a payment request on esewa.
     *
     * @param  Http   $http
     * @param  string $httpVerb
     * @param  array $requests
     * @return Response
     */
    public function createPayment($httpVerb, $requests = null)
    {
        try {
            $this->esewa_http->_doRequest($httpVerb, $this->setConfig()->paymentUrl, $requests);
        } catch (\Exception $e) {
            //
        }
    }

    /**
     * [redirectToPayment description]
     * @return [type] [description]
     */
    public function redirectToPayment()
    {
        //
    }
}
