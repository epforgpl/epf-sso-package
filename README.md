# epf-sso-package
Centralized login for external users to various EPF services (as a Laravel package).

### Notes 
When adding this package to a Laravel app, you must add the route `'oauth/token'` to the `$except` array 
in the `VerifyCsrfToken` middleware. See [this SO question](https://stackoverflow.com/questions/33177674).
