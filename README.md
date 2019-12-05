# *qonto-laravel*

## What is *Qonto*  ?

Qonto is a new bank company for freelancers & companies (more infos : [qonto.eu](qonto.eu))

## What is **qonto-laravel** ?

*Qonto* provides an API for companies to get data from their bank account.

*qonto-laravel* is a client, for Laravel 5+ (and 6), to request this API. It uses [qonto-php](https://github.com/tavux/qonto-php).

*qonto-laravel* only supports the second version of Qonto API.

## How to install it ?

- `composer require tavux/qonto-laravel` 
- edit `.env` and add `QONTO_LOGIN` and `QONTO_PASSWORD` with your API credentials (API login/password)
- If Laravel version < 5.8 :
   - Add `\Tavux\Qonto\Laravel\QontoServiceProvider::class` to your providers in `config/app.php`
   - Add `'Qonto' => \Tavux\Qonto\Laravel\Facades\Qonto::class` to your aliases in `config/app.php`
- `php artisan vendor:publish --tag=qonto`

## How to use it ?

#### *Qonto* API Documentation
 
[Qonto API v2 Documentation](https://api-doc.qonto.eu/2.0/welcome/authentication)

#### *qonto-laravel* Documentation

```php
    /**
     * @param string $slug
     * @param string $iban
     * @param array $status
     * @param string $updated_at_from
     * @param string $updated_at_to
     * @param string $settled_at_from
     * @param string $settled_at_to
     * @param string $sort_by
     * @param integer $current_page
     * @param integer $per_page
     * @return Transaction[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listTransactions($slug, $iban=null, $status=null, $updated_at_from=null, $updated_at_to=null, $settled_at_from=null, $settled_at_to=null, $sort_by=null, $current_page=null, $per_page=null);

    /**
     * @param integer $current_page
     * @param integer $per_page
     * @return Label[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listLabels($current_page=null, $per_page=null);

    /**
     * @param integer $current_page
     * @param integer $per_page
     * @return Membership[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listMemberships($current_page=null, $per_page=null);

    /**
     * @param int $id
     * @return Attachment
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttachment($id);

    /**
     * @param int $id
     * @return Organization
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrganization($id);
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
