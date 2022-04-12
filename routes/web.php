<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('login', [App\Http\Controllers\CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');

Route::group(['prefix' => 'admin','middleware' => ['auth','admin','priventBackHistory']], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    // Users
    Route::get('users', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.users');
    Route::get('/users.create',  [App\Http\Controllers\AdminController::class, 'usercreate'])->name('admin.users.create');
    Route::post('users.store', [App\Http\Controllers\AdminController::class, 'userstore'])->name('admin.users.store');
    Route::get('users.show.{id}', [App\Http\Controllers\AdminController::class, 'usershow'])->name('admin.users.show');
    Route::get('users.edit.{id}', [App\Http\Controllers\AdminController::class, 'useredit'])->name('admin.users.edit');
    Route::get('users.publish.{id}', [App\Http\Controllers\AdminController::class, 'userpublish'])->name('admin.users.publish');
    Route::get('users.unpublish.{id}', [App\Http\Controllers\AdminController::class, 'userunpublish'])->name('admin.users.unpublish');
    Route::patch('users.update.{id}', [App\Http\Controllers\AdminController::class, 'userupdate'])->name('admin.users.update');
    Route::delete('/users.destroy.{id}', [App\Http\Controllers\AdminController::class, 'userdestroy'])->name('admin.users.destroy');
    // Admin role
    Route::get('/roles', [App\Http\Controllers\AdminController::class, 'role'])->name('admin.roles');
    Route::get('/roles.create', [App\Http\Controllers\AdminController::class, 'rolecreate'])->name('admin.roles.create');
    Route::post('/roles.store', [App\Http\Controllers\AdminController::class, 'rolestore'])->name('admin.roles.store');
    Route::get('/roles.show.{id}', [App\Http\Controllers\AdminController::class, 'roleshow'])->name('admin.roles.show');
    Route::get('/roles.edit.{id}', [App\Http\Controllers\AdminController::class, 'roleedit'])->name('admin.roles.edit');
    Route::patch('/roles.update.{id}', [App\Http\Controllers\AdminController::class, 'roleupdate'])->name('admin.roles.update');
    Route::delete('/roles.destroy.{id}', [App\Http\Controllers\AdminController::class, 'roledelete'])->name('admin.roles.destroy');
    
    
    // Admin permission
    Route::get('/permissions', [App\Http\Controllers\AdminController::class, 'permission'])->name('admin.permissions');
    Route::get('/permissions.create', [App\Http\Controllers\AdminController::class, 'permissioncreate'])->name('admin.permissions.create');
    Route::post('/permissions.store', [App\Http\Controllers\AdminController::class, 'permissionstore'])->name('admin.permissions.store');
    Route::get('/permissions.show.{id}', [App\Http\Controllers\AdminController::class, 'permissionshow'])->name('admin.permissions.show');
    Route::get('/permissions.edit.{id}', [App\Http\Controllers\AdminController::class, 'permissionedit'])->name('admin.permissions.edit');
    Route::patch('/permissions.update.{id}', [App\Http\Controllers\AdminController::class, 'permissionupdate'])->name('admin.permissions.update');
    Route::delete('/permissions.destroy.{id}', [App\Http\Controllers\AdminController::class, 'permissiondelete'])->name('admin.permissions.destroy');
    
  

});

Route::group(['prefix' => 'executive','middleware' => ['auth','executive','priventBackHistory']], function() {
    Route::get('/', [App\Http\Controllers\ExecutiveController::class, 'index'])->name('executive');
    // Users
    Route::get('users', [App\Http\Controllers\ExecutiveController::class, 'user'])->name('executive.users');
    Route::get('/users.create',  [App\Http\Controllers\ExecutiveController::class, 'usercreate'])->name('executive.users.create');
    Route::post('users.store', [App\Http\Controllers\ExecutiveController::class, 'userstore'])->name('executive.users.store');
    Route::get('users.show.{id}', [App\Http\Controllers\ExecutiveController::class, 'usershow'])->name('executive.users.show');
    Route::get('users.edit.{id}', [App\Http\Controllers\ExecutiveController::class, 'useredit'])->name('executive.users.edit');
    Route::get('users.publish.{id}', [App\Http\Controllers\ExecutiveController::class, 'userpublish'])->name('executive.users.publish');
    Route::get('users.unpublish.{id}', [App\Http\Controllers\ExecutiveController::class, 'userunpublish'])->name('executive.users.unpublish');
    Route::patch('users.update.{id}', [App\Http\Controllers\ExecutiveController::class, 'userupdate'])->name('executive.users.update');
    Route::delete('/users.destroy.{id}', [App\Http\Controllers\ExecutiveController::class, 'userdestroy'])->name('executive.users.destroy');
    // Admin role
    Route::get('/roles', [App\Http\Controllers\ExecutiveController::class, 'role'])->name('executive.roles');
    Route::get('/roles.create', [App\Http\Controllers\ExecutiveController::class, 'rolecreate'])->name('executive.roles.create');
    Route::post('/roles.store', [App\Http\Controllers\ExecutiveController::class, 'rolestore'])->name('executive.roles.store');
    Route::get('/roles.show.{id}', [App\Http\Controllers\ExecutiveController::class, 'roleshow'])->name('executive.roles.show');
    Route::get('/roles.edit.{id}', [App\Http\Controllers\ExecutiveController::class, 'roleedit'])->name('executive.roles.edit');
    Route::patch('/roles.update.{id}', [App\Http\Controllers\ExecutiveController::class, 'roleupdate'])->name('executive.roles.update');
    Route::delete('/roles.destroy.{id}', [App\Http\Controllers\ExecutiveController::class, 'roledelete'])->name('executive.roles.destroy');
    // Admin permission
     Route::get('/permissions', [App\Http\Controllers\ExecutiveController::class, 'permission'])->name('executive.permissions');
    Route::get('/permissions.create', [App\Http\Controllers\ExecutiveController::class, 'permissioncreate'])->name('executive.permissions.create');
    Route::post('/permission.store', [App\Http\Controllers\ExecutiveController::class, 'permissionstore'])->name('executive.permissions.store');
    Route::get('/permissions.show.{id}', [App\Http\Controllers\ExecutiveController::class, 'permissionshow'])->name('executive.permissions.show');
    Route::get('/permissions.edit.{id}', [App\Http\Controllers\ExecutiveController::class, 'permissionedit'])->name('executive.permissions.edit');
    Route::patch('/permissions.update.{id}', [App\Http\Controllers\ExecutiveController::class, 'permissionupdate'])->name('executive.permissions.update');
    Route::delete('/permissions.destroy.{id}', [App\Http\Controllers\ExecutiveController::class, 'permissiondelete'])->name('executive.permissions.destroy');

});
Route::group(['prefix' => 'developer','middleware' => ['auth','developer','priventBackHistory']], function() {
    Route::get('/', [App\Http\Controllers\DeveloperController::class, 'index'])->name('developer');
   
    Route::get('users', [App\Http\Controllers\DeveloperController::class, 'user'])->name('developer.users');
    Route::get('/users.create',  [App\Http\Controllers\DeveloperController::class, 'usercreate'])->name('developer.users.create');
    Route::post('users.store', [App\Http\Controllers\DeveloperController::class, 'userstore'])->name('developer.users.store');
    Route::get('users.show.{id}', [App\Http\Controllers\DeveloperController::class, 'usershow'])->name('developer.users.show');
    Route::get('users.edit.{id}', [App\Http\Controllers\DeveloperController::class, 'useredit'])->name('developer.users.edit');
    Route::get('users.publish.{id}', [App\Http\Controllers\DeveloperController::class, 'userpublish'])->name('developer.users.publish');
    Route::get('users.unpublish.{id}', [App\Http\Controllers\DeveloperController::class, 'userunpublish'])->name('developer.users.unpublish');
    Route::patch('users.update.{id}', [App\Http\Controllers\DeveloperController::class, 'userupdate'])->name('developer.users.update');
    Route::delete('/users.destroy.{id}', [App\Http\Controllers\DeveloperController::class, 'userdestroy'])->name('developer.users.destroy');
    // Admin role
    Route::get('/roles', [App\Http\Controllers\DeveloperController::class, 'role'])->name('developer.roles');
    Route::get('/roles.create', [App\Http\Controllers\DeveloperController::class, 'rolecreate'])->name('developer.roles.create');
    Route::post('/roles.store', [App\Http\Controllers\DeveloperController::class, 'rolestore'])->name('developer.roles.store');
    Route::get('/roles.show.{id}', [App\Http\Controllers\DeveloperController::class, 'roleshow'])->name('developer.roles.show');
    Route::get('/roles.edit.{id}', [App\Http\Controllers\DeveloperController::class, 'roleedit'])->name('developer.roles.edit');
    Route::patch('/roles.update.{id}', [App\Http\Controllers\DeveloperController::class, 'roleupdate'])->name('developer.roles.update');
    Route::delete('/roles.destroy.{id}', [App\Http\Controllers\DeveloperController::class, 'roledelete'])->name('developer.roles.destroy');
    // Admin permission
    Route::get('/permissions', [App\Http\Controllers\DeveloperController::class, 'permission'])->name('developer.permissions');
    Route::get('/permissions.create', [App\Http\Controllers\DeveloperController::class, 'permissioncreate'])->name('developer.permissions.create');
    Route::post('/permissions.store', [App\Http\Controllers\DeveloperController::class, 'permissionstore'])->name('developer.permissions.store');
    Route::get('/permissions.show.{id}', [App\Http\Controllers\DeveloperController::class, 'permissionshow'])->name('developer.permissions.show');
    Route::get('/permissions.edit.{id}', [App\Http\Controllers\DeveloperController::class, 'permissionedit'])->name('developer.permissions.edit');
    Route::patch('/permissions.update.{id}', [App\Http\Controllers\DeveloperController::class, 'permissionupdate'])->name('developer.permissions.update');
    Route::delete('/permissions.destroy.{id}', [App\Http\Controllers\DeveloperController::class, 'permissiondelete'])->name('developer.permissions.destroy');

});

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('users', App\Http\Controllers\UserController::class);
//     Route::resource('roles', App\Http\Controllers\RoleController::class);
//     Route::resource('permissions', App\Http\Controllers\PermissionController::class);	
// });
// Route::get('/executive', [App\Http\Controllers\ExecutiveController::class, 'index'])->name('executive')->middleware('executive');
// Route::get('/developer', [App\Http\Controllers\DeveloperController::class, 'index'])->name('developer')->middleware('developer');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




