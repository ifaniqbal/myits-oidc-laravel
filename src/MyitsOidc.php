<?php
namespace Ifaniqbal\MyitsOidc;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Its\Sso\OpenIDConnectClient;

class MyitsOidc
{
    public function init()
    {
        $oidc = new OpenIDConnectClient(
            Config::get('myits-oidc.auth_endpoint'),
            Config::get('myits-oidc.id'),
            Config::get('myits-oidc.secret')
        );

        $oidc->setRedirectURL(URL::to(Config::get('myits-oidc.redirect_path')));
        $oidc->addScope(Config::get('myits-oidc.scope'));
        return $oidc;
    }

    public function authenticate()
    {
        $oidc = $this->init();

        if (App::environment() != 'production') {
            $oidc->setVerifyHost(false);
            $oidc->setVerifyPeer(false);
        }

        $oidc->authenticate();
        return $oidc;
    }
}