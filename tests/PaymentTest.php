<?php

use Esewa\Billable;

/**
* class payment testcase.
*/
class PaymentTest extends TestCase
{

    /**
     * @test
     * @return void
     */
    public function it_procceed_to_payment()
    {
        Billable::pay('POST', 'http://dev.esewa.com.np/epay/transrec', [
            'tAmt' => 100
            ]);
    }
}
