<?php

use Esewa\Billable;
use Esewa\Http as Esewa_Http;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

/**
* class payment testcase.
*/
class EsewaTest extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        if (file_exists(__DIR__.'/../.env')) {
            $dotenv = new Dotenv\Dotenv(__DIR__.'/../');
            $dotenv->load();
        }
    }


    /**
     * Schema Helpers.
     */
    protected function schema()
    {
        return $this->connection()->getSchemaBuilder();
    }
    protected function connection()
    {
        return Eloquent::getConnectionResolver()->connection();
    }

    public function setUp()
    {
        Eloquent::unguard();
        $db = new DB;
        $db->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
        $db->bootEloquent();
        $db->setAsGlobal();
        $this->schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
             $table->timestamps();
        });
    }

    public function tearDown()
    {
        $this->schema()->drop('users');
    }

     /**
     * @test
     * @return void
     */
    public function it_procceed_to_payment()
    {
        $user = User::create([
            'email' => 'admin@esewa.com',
            'name' => 'Admin Esewa',
            ]);
        $payment_details = [
        'amt' => 90,
        'tAmt' => 100,
        'txAmt' => 5,
        'psc' => 2,
        'pdc' > 3,
        'scd' > "eSewa_act360",
        'pid' => "PRD-01",
        'su' => 'http://abc.com/success.html?q=su',
        'fu' => 'http://abc.com/failure.html?q=fu'
        ];
        $user->createPayment('POST', "http://dev.esewa.com.np/epay/main", $payment_details);
        dd($user);
    }


}


class User extends Eloquent
{
    use Esewa\Billable;
}
