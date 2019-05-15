# epf-sso-package
Centralized login for external users to various EPF services (as a Laravel package).

### Installation
Let's call the Laravel app you want to use this package in 'App X'.

**composer.json**

In `composer.json` of App X, add:

    "require": {
        [...]
        "epforgpl/epf-sso-package": "dev-master"
    }

and:

    "repositories": [
        {
            "type": "github",
            "url": "https://github.com/epforgpl/epf-sso-package"
        }
    ]

Then run `composer update`.

**CSRF token**

In App X, you must add the route `'oauth/token'` to the `$except` array 
in the `VerifyCsrfToken` middleware. See [this SO question](https://stackoverflow.com/questions/33177674).

**Environment variables**

In App X, you want to set the following env variables (Google & Facebook only in case you need social login):

    CORS_ALLOWED_ORIGINS=https://app-x-domain.com 
    SIGN_IN_W_GOOGLE_CLIENT_ID=example.apps.googleusercontent.com
    SIGN_IN_W_GOOGLE_CLIENT_SECRET=ExampleGoogleSecret
    SIGN_IN_W_FACEBOOK_CLIENT_ID=1234567890
    SIGN_IN_W_FACEBOOK_CLIENT_SECRET=ExampleFacebookSecret
    
**DB migrations**

There's a number of migrations to be applied, the same as in `epf-sso` project.
I don't want to copy them to this project because they are already applied to our prod DB
and I don't want to risk accidental data corruption, if `php artisan migrate` is also called
within App X.
