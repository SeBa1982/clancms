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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'member']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        // Categories Gates

        Gate::define('manage-categories', function($user){
            return $user->hasAnyRoles(['admin', 'member']);
        });

        // Front-End
        Gate::define('isAdmin', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('isMember', function($user){
            return $user->hasAnyRoles(['admin', 'member']);
        });
    }
}
