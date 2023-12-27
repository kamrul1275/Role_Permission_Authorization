<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Configuration\Php;

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




        view()->composer('*', function ($view) {
            if (Auth::guard('web')->check()) {
                $userinfo = Auth::guard('web')->user();

                $user = $userinfo->role->name;
                //dd($user);

               $permissions = $userinfo->role->permissions->pluck('name')->toArray();
               // $permissions = $userinfo->role->permissions->toArray();
                //dd($permissions);

                $view->with('userPermissions', $permissions);

            //   $permissions = $userinfo->role->permissions->toArray();

                // dd($permissions);
            //    $permissions = [];
            //    foreach ($permissions as $permission) {


            //         Gate::define($permission->name, function (User $user) {
            //             return true;
            //         });



            //     }
            }
        });


        Gate::define('create', function (User $user) {

            $role = $user->role;
            //dd($role && $role->name == 'creator');
            return $role && ($role->name == $user->role['name']);
        });



        Gate::define('edit', function (User $user) {
            // Assuming 'role' is a relationship on the User model
            $role = $user->role;
            // return  $role;
            //dd($role && $role->name == 'Admin','Manager);
            return $role && ($role->name == $user->role['name'] || $role->name == $user->role['name']);
        });



        Gate::define('view', function (User $user) {

            // all role
            $role = $user->role;
            return $role && ($role->name == $user->role['name'] || $role->name == $user->role['name'] || $role->name == $user->role['name']);
        });

        Gate::define('delete', function (User $user) {
            $role = $user->role;
            //dd($role && $role->name == 'Admin');
            return $role && ($role->name == $user->role['name']);
        });
    }
}
