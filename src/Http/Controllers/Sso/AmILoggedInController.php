<?php

namespace EpfOrgPl\EpfSso\Http\Sso;

use Barryvdh\Cors\HandleCors;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AmILoggedInController extends BaseController
{
    public function __construct()
    {
        $this->middleware(HandleCors::class);
    }

    public function handleRequest()
    {
        \Debugbar::disable(); // Otherwise, it returns not only true/false, but also some JS messing things up.
        return Auth::check() ? 'true' : 'false';
    }
}
