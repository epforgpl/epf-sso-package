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
        return Auth::check() ? 'true' : 'false';
    }
}
