## YII2 MPESA DARAJA SDK

This package provides a seamless integration of M-PESA Daraja APIs in Yii2 applications
- B2C (Business to Customer)
- C2B (Customer to Business)
- B2B (Business to Business)
- Account Balance inquiries
- Transaction reversals queries
- Transaction status queries.

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ssiva/yii2-mpesa-sdk
```

or

```
composer require --prefer-dist ssiva/yii2-mpesa-sdk
```

or add

```
"ssiva/yii2-mpesa-sdk": "*"
```

to the require section of your `composer.json` file.

### Configuration
Set up the config values as required
- Copy the file [mpesa.php](src/config/mpesa.php) to `@app/config/mpesa.php` and set you config values.
- Add the component configuration to `config/web.php` as below
  - Require the copied config file
      ```php
      $mpesa = require __DIR__.'/mmpesa.php';
      ```
  - Add the required value to the components array
      ```php
      'mpesaDaraja' => $mpesa,
      ```
The library is now ready for use.

### Usage Examples

```php
<?php
namespace YOURNAMESPACE;

class CheckoutController extends Controller {
   
   public function actionCheckout(
        $mpesaDaraja = Yii::$app->mpesaDaraja->getDaraja();
        
        // authenticate
        $mpesaDaraja->authenticate();
        
        // STK Push
        $stkParams = [
            'Amount' => '2',
            'PartyA' => '2547XXXXXXXX',
            'PhoneNumber' => '2547XXXXXXXX',
            'AccountReference' => '13',
            'TransactionDesc' => 'Shopping',
        ];
       $mpesaDaraja->stkPush($stkParams);
       
       // stk push status query
       $stkQueryParams = [
         'CheckoutRequestID' => "ws_CO_290320231617432767XXXXXXXX",
       ];
       $mpesaDaraja->stkPushQuery($stkQueryParams);
       
       // transaction status query
       $statusParams = [
         'Remarks' => "Status test for RCC3LAPCEL",
         "TransactionID" => "RCC3LAPCEL",
         "Occasion" => "Optional Value for Occasion"
       ];
       $mpesaDaraja->transactionStatus($statusParams);

   }
}

```
