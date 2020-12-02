# Laravel wrapper for MyITS OpenID Connect

The purpose of this package is to simplify the implementation of MyITS SSO on the Laravel project. Currently support Laravel 5.1, 5.5 and 6.x.

## Installation

```bash
composer require ifaniqbal/myits-oidc-laravel
```

If using Laravel 5.1, include the service provider within `config/app.php`.

```php
'providers' => [
    'Ifaniqbal\MyitsOidc\MyitsOidcServiceProvider',
];
```

Add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'MyitsOidc' => 'Ifaniqbal\MyitsOidc\Facades\MyitsOidc',
];
```

## Configuration

These are list of `.env` keys that can be configured:

```php
MYITS_OIDC_ID= # client ID
MYITS_OIDC_SECRET= # client secret
MYITS_OIDC_REDIRECT_PATH= # redirect path, default: /myits-sso
MYITS_OIDC_AUTH_ENDPOINT= # authorization endpoint, default: https://my.its.ac.id
MYITS_OIDC_SCOPE= # scope, default: 'profile role openid'
MYITS_OIDC_API_AUTH_ENDPOINT= # API auth endpoint, default: the value of MYITS_OIDC_AUTH_ENDPOINT
MYITS_OIDC_API_CLIENT_ID= # API client ID, default: the value of MYITS_OIDC_ID
MYITS_OIDC_API_CLIENT_SECRET= # API client secret, default: the value of MYITS_OIDC_SECRET
```


For example in `production` if most of the values you need is same as default values, configure only these values within your `.env` file:

```html
MYITS_OIDC_ID=
MYITS_OIDC_SECRET=
```

And for `local` development, configure these values within your `.env` file:

```html
MYITS_OIDC_ID=
MYITS_OIDC_SECRET=
MYITS_OIDC_REDIRECT_PATH=
MYITS_OIDC_AUTH_ENDPOINT=
MYITS_OIDC_API_CLIENT_ID=
MYITS_OIDC_API_CLIENT_SECRET=
```

## Usage

This is an example which handle request from `MYITS_OIDC_REDIRECT_PATH`:

```php
<?php
namespace App\Http\Controllers;

use Ifaniqbal\MyitsOidc\Facades\MyitsOidc;

class MyitsSsoController extends Controller
{
    public function index()
    {
        $oidc = MyitsOidc::authenticate();

        // $oidc->getIdToken();
        // $oidc->getAccessToken();
        // $oidc->requestUserInfo();
    }
}
```
