<?php

namespace EpfOrgPl\EpfSso\Http\Sso;

use SimpleJWT\Keys\KeySet;
use SimpleJWT\Keys\RSAKey;

class JwksController extends OAuth2BaseController
{

    public function getJwks()
    {
        \Debugbar::disable(); // Otherwise, it returns not only the JSON with keys, but also some JS messing things up.
        $set = new KeySet();
        $key = $this->server->getStorage('public_key')->getPublicKey();
        $set->add(new RSAKey($key, 'pem'));
        return $set->toJWKS();
    }
}
