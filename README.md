# *qonto-laravel*

## What is *Qonto*  ?

Qonto is a new bank company for freelancers & companies (more infos : [qonto.eu](qonto.eu))

## What is **qonto-laravel** ?

*Qonto* provides an API for companies to get data from their bank account.

*qonto-laravel* is a client, for Laravel 5+ (and 6), to request this API. It uses [qonto-php](https://github.com/tavux/qonto-php).

*qonto-laravel* only supports the second version of Qonto API.

## How to install it ?

- `composer require tavux/qonto-laravel` 
- If Laravel version < 5.8 :
   - Add `\Tavux\Qonto\Laravel\QontoServiceProvider::class` to your providers in `config/app.php`
   - Add `'Qonto' => \Tavux\Qonto\Laravel\Facades\Qonto::class` to your aliases in `config/app.php`
- `php artisan vendor:publish --tag=qonto`
- edit `.env` and add `QONTO_LOGIN` and `QONTO_SECRET_KEY` with your API credentials (see https://api-doc.qonto.eu/2.0/welcome/authentication)

## How to use it ?

#### *Qonto* API Documentation
 
[Qonto API v2 Documentation](https://api-doc.qonto.eu/2.0/welcome/authentication)

#### *qonto-laravel* Documentation

```php
   /**
    * @method static \Tavux\Qonto\Models\Attachment getAttachment(string $id)
    * @method static \Tavux\Qonto\Models\Organization getOrganization(string $id)
    * @method static \Tavux\Qonto\Models\Labels listLabels(int $current_page=null, int $per_page=null)
    * @method static \Tavux\Qonto\Models\Memberships listMemberships(int $current_page=null, int $per_page=null)
    * @method static \Tavux\Qonto\Models\Transactions listTransactions($slug, string $iban=null, string $status=null, string $updated_at_from=null, string $updated_at_to=null, string $settled_at_from=null, string $settled_at_to=null, string $sort_by=null, int $current_page=null, int $per_page=null)
    * @method static void setCredentials($login, $secret_key)
    */
```

#### Example 
```php

try {
    $organization = Qonto::getOrganization('company_id');
    $transactions = Qonto::listTransactions($organization->bank_accounts[0]->slug);
    $labels = Qonto::listLabels();
    $memberships = Qonto::listMemberships();

    var_dump($organization, $transactions, $labels, $memberships);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
```

## Author
*qonto-laravel* has been initiated by [Tavux](https://tavux.tech).

## License
MIT Licence. Refer to the [LICENSE](https://github.com/tavux/qonto-laravel/blob/master/LICENSE) file to get more info.
