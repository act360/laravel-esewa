# Easy Esewa Payment Integration For Your Laravel App

This composer package offers a E-sewa payment gateway setup for your Laravel applications.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require act360/laravel-esewa
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Esewa\EsewaServiceProvider::class,
];
```

Finally, add these variable to `.env`.

```env
ESEWA_MERCHANT_ID=YOUR_ESEWA_MERCHANT_ID
ESEWA_TRANSACTION_URL=ESEWA_PAYMENT_URL
```

## Usage

Within your Model, make a call to the `Billable` trait.

```php
namespace App;

use Esewa\Billable;

Class Store extends Model
{
    use Billable;
}
```

You can use this on controller as:


```php
Class StoreController extends Controller
{
    public function create(Request $request, Store $store)
    {
        $item = $store->create($request->all());
        $payment_details = [
            'tAmt' => 100,
            'amt' => 100,
            'pid' => "PR-01",
            'su' => "YOUR_SUCCESS_URL",
            'fu' => "YOUR_FAILURE_URL"
        ];
        $item->charge($payment_details);
    }

    public function success()
    {
        // Do something here when payment success.
    }

    public function failure()
    {
        // Do something here when payment failure.
    }
}
```

Done! You'll now be able to use esewa gateway.

