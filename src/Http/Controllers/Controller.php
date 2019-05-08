<?php

namespace EpfOrgPl\EpfSsoPackage\Http;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    public function index()
    {
        return view('epf-sso::sample-view');
    }
}
