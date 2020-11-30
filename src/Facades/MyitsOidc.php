<?php
namespace Ifaniqbal\MyitsOidc\Facades;

use Illuminate\Support\Facades\Facade;

class MyitsOidc extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'myits-oidc';
    }
}
