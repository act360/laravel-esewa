<?php

return [

    /**
     * Set Environment [development | production].
     */
    'environment'         => 'development',

    /**
     * Set production URL.
     */
    'production' => [
                'gateway' => 'https://esewa.com.np/epay/main',
                'verification' => 'https://esewa.com.np/epay/transrec'
    ],

    /**
     * Set development URL.
     */
    'sandbox' => [
             'gateway' => 'https://dev.esewa.com.np/epay/main',
             'verification' => 'http://dev.esewa.com.np/epay/transrec'
    ],

    /**
     * Set Merchant Identity number.
     */
    'merchant_id' => '',
];
