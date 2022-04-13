<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Definisco i gate da utilizzare nelle direttive @can()
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('isOrg', function ($user) {
            return $user->hasRole('organizer');
        });
        
        Gate::define('isUser', function ($user) {
            return $user->hasRole('user');
        });
        
        Gate::define('isLevel3-4', function ($user) {
            return (($user->hasRole('admin'))or($user->hasRole('organizer')));
        });
}
}
