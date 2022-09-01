<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('manage-categories', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-ads', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('create-ads', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-ads', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-ads', function($user){
            return $user->hasRole('admin', 'author');
        });


    }
}
