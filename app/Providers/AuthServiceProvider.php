<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

 
    

        Gate::define('admin', function (User $user) {
            return $user->role=='admin';
        });
        


        Gate::define('maneger', function (User $user) {
            return $user->role=='maneger';
        });
        


        // Gate::define('isAdmin', function(User $user){
        //     return $user->roles=='isAdmin';
        // });


        // Gate::define('delete', function(User $user){
        //     return $user;
        // });


     
    }

}