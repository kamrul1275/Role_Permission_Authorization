<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Role_Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

  
 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// test
Route::get('/edit/test', function () {

    Gate::authorize('edit','user');
   

    return view('test.edit');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// backend part strat

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('post-login', [AdminController::class, 'AdminPostLogin'])->name('admin.login.post');
    

Route::middleware('backend')->group( function(){


  
    
    //Route::post('/admin/login',[AdminController::class,'AdminLogin']);
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    
    
    
    
       // Role part...
       Route::get('/role/create', [RoleController::class, 'Create'])->name('role.create');
       Route::post('/role/store', [RoleController::class, 'Store'])->name('role.store');
    
    
    
    
    
       //Role part...
       Route::get('/role', [RoleController::class, 'Index'])->name('role.index');
       Route::get('/role/delete/{id}', [RoleController::class, 'Delete'])->name('role.delete');
       //permission....
       Route::get('/permission', [PermissionController::class, 'Index'])->name('permission.index');
    
    
       // permission part
    
       Route::get('/permission/create/role', [PermissionController::class, 'CreatePermission'])->name('create.permission.role');
    
       Route::post('/permission/store', [PermissionController::class, 'Store'])->name('permission.store');
       Route::get('/permission/delete/{id}', [PermissionController::class, 'Delete'])->name('permission.delete');
    
    
       Route::get('/permission/view', [PermissionController::class, 'permissionView'])->name('permission.view');
       Route::get('/permission/create', [PermissionController::class, 'PermissionCreate'])->name('permission.create');
       Route::get('/permission/edit', [PermissionController::class, 'permissionEdit'])->name('permission.edit');
       Route::get('/permission/delete', [PermissionController::class, 'permissionDelete'])->name('permission.delete');




});

