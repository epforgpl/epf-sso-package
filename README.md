# epf-sso-package
Centralized login for external users to various EPF services (as a Laravel package).

### Notes 
When adding this package to a Laravel app, you must add the route `'oauth/token'` to the `$except` array 
in the `VerifyCsrfToken` middleware. See [this SO question](https://stackoverflow.com/questions/33177674).

When adding this package to a Laravel app, you want to set the following env variables:

- CORS_ALLOWED_ORIGINS=https://example-domain.com 
- SIGN_IN_W_GOOGLE_CLIENT_ID=example.apps.googleusercontent.com
- SIGN_IN_W_GOOGLE_CLIENT_SECRET=ExampleGoogleSecret
- SIGN_IN_W_FACEBOOK_CLIENT_ID=1234567890
- SIGN_IN_W_FACEBOOK_CLIENT_SECRET=ExampleFacebookSecret
