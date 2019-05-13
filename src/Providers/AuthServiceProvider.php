<?php

namespace EpfOrgPl\EpfSso\Providers;

use EpfOrgPl\EpfSso\Auth\EpfHasher;
use EpfOrgPl\EpfSso\Auth\EpfUserProvider;
use EpfOrgPl\EpfSso\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(EpfHasher $hasher)
    {
        $this->registerPolicies();

        Validator::extend('matches_current_password', function ($attr, $value, $params, $validator) use ($hasher) {
            if (!Auth::check()) {
                throw new \Exception('"matches_current_password" validation rule should only be used on forms '
                    . 'available to logged-in users.');
            }
            return $hasher->check($value, Auth::user()->password, ['hash_type' => Auth::user()->hash_type]);
        });

        Validator::extend('is_registered_user', function ($attr, $value, $params, $validator) {
            return (User::whereEmail($value)->first() !== null);
        });

        Auth::provider('epf', function ($app, array $config) {
            return new EpfUserProvider($this->app['epfhash'], $this->app['config']['auth.providers.users.model']);
        });
    }
}
