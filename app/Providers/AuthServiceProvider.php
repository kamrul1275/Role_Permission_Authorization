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

        view()->composer('*', function () {
            if (Auth::guard('web')->check()) {
                $user =Auth::guard('web')->user();
               // logger($users);

                //return $users;
                //dd($users);
               // $permission = User::with('role')->where('name',$users)->get();
                //dd($permission);
                dd($user->role->toarray());
               
            
                ///dd($permissions); $permissions;

                $permissions = [];

                foreach ($permissions as $key => $permission) {
                    Gate::define($permission->name, function (User $user) {

                        return true;
                    });
                }
            }
        });





        // if (Auth::check()) {
        //     // User is logged in, so it's safe to access properties
        //     $user_id = Auth::user()->name;
        //     dd($user_id);
        // }else{
        //     dd('Eorre working..');
        // }








        // Gate::define('isAdmin', function (User $user) {
        //     // Assuming 'role' is a relationship on the User model
        //     $role = $user->role;
        //    // return  $role;
        //    //dd($role && $role->name == 'Admin');
        //     return $role && $role->name == 'Admin';
        // });


        // Gate::define('isManager', function (User $user) {
        //     // Assuming 'role' is a relationship on the User model
        //     $role = $user->role;
        //     return $role && $role->name == 'Manager';
        // });



        // Gate::define('isCreator', function (User $user) {
        //     // Assuming 'role' is a relationship on the User model
        //     $role = $user->role;
        //     return $role && $role->name == 'Creator';
        // });



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
