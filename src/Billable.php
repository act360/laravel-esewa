<?php

namespace Esewa;

use Esewa\Http as Esewa_Http;

trait Billable
{
    /**
     * Create a payment request on esewa.
     *
     * @param  Http   $http
     * @param  string $httpVerb
     * @param  array $requests
     * @return Response
     */
    public function charge($httpVerb, $url, $requests = null)
    {
        try {
            (new Esewa_Http())->_doRequest($httpVerb, $url, $requests);
        } catch (\Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
