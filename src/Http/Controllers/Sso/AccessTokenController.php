<?php

namespace EpfOrgPl\EpfSso\Http\Sso;

use Illuminate\Http\Request;
use OAuth2\HttpFoundationBridge\Request as BridgedRequest;
use OAuth2\Response as OAuthResponse;

class AccessTokenController extends OAuth2BaseController
{
    public function handleRequest(Request $request)
    {
        // No need to disable Laravel Debugbar (as in other controllers), because it handles a POST request, not GET.
        /** @var \OAuth2\Response $oauth_res */
        $oauth_res = $this->server->handleTokenRequest(BridgedRequest::createFromRequest($request),new OAuthResponse());
        return $this->convertOAuthResponseToSymfonyResponse($oauth_res);
    }
}
