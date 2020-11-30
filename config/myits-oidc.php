<?php

return [
    'id'                => env('MYITS_OIDC_ID'),
    'secret'            => env('MYITS_OIDC_SECRET'),
    'auth_endpoint'     => env('MYITS_OIDC_AUTH_ENDPOINT', 'https://my.its.ac.id'),
    'scope'             => env('MYITS_OIDC_SCOPE', 'profile role openid'),
    'redirect_path'     => env('MYITS_OIDC_REDIRECT_PATH', 'myits-sso'),
    'api_auth_endpoint' => env('MYITS_OIDC_API_AUTH_ENDPOINT', 'https://my.its.ac.id'),
    'api_client_id'     => env('MYITS_OIDC_API_CLIENT_ID', env('MYITS_OIDC_ID')),
    'api_client_secret' => env('MYITS_OIDC_API_CLIENT_SECRET', env('OIDC_SECRET')),
];
