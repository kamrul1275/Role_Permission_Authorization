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
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();



        Gate::define('isAdmin', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
           // return  $role;
           //dd($role && $role->name == 'Admin');
            return $role && $role->name == 'Admin';
        });
        

        Gate::define('isManager', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
            return $role && $role->name == 'Manager';
        });
    


        Gate::define('isCreator', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
            return $role && $role->name == 'Creator';
        });



        Gate::define('create', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
           // return  $role;
           //dd($role && $role->name == 'Admin');
            return $role && ($role->name == 'Creator');
        });



        Gate::define('edit', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
           // return  $role;
           //dd($role && $role->name == 'Admin');
            return $role && ($role->name == 'Admin' || $role->name == 'Creator');
        });

        Gate::define('view', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
           // return  $role;
           //dd($role && $role->name == 'Admin');
            return $role && ($role->name == 'Admin' || $role->name == 'Manager' ||  $role->name == 'Creator');
        });

        Gate::define('delete', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
           // return  $role;
           //dd($role && $role->name == 'Admin');
            return $role && ($role->name == 'Admin');
        });




    }
}
