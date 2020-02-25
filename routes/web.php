<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
//Route::group(['middleware' => ['auth']], function () {
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');
//
//});
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard::'], function () {
    /**
     * Dashboard Index
     * // Route named "dashboard::index"
     */
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index'])->middleware('TwoFA');
    /**
     * Profile
     * // Route named "dashboard::profile"
     */
    Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
    Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);
});


Route::get('/verifyOTP', 'OTPController@index')->name('verifyOTP');
Route::post('/verifyOTP', 'OTPController@verify')->name('verifyOTP');
Route::post('/resendOTP', 'OTPController@resend')->name('resendOTP');
Route::get('/home', 'HomeController@index')->name('home')->middleware('TwoFA');
Route::get('/', 'HomeController@index')->name('home')->middleware('TwoFA');
Route::get('role-pages-association/getassociation/{id}', 'RolePageController@ajaxGetRequest')->name('role.page.getassociation');
Route::get('profile/edit/{id}', 'UserController@profileEdit')->name('profile.edit.get')->middleware('auth');
Route::post('profile/edit/{id}', 'UserController@profileUpdate')->name('profile.edit.post')->middleware('auth');
Route::get('usergroup-role-association/getassociation/{id}', 'UsergroupRoleController@ajaxGetData')->name('usergroup.role.getassociation')->middleware('auth');
Route::get('user-usergroup-association/getassociation/{id}', 'UserUsergroupController@ajaxGetData')->name('user.usergroup.getassociation')->middleware('auth');
Route::get('pages/getassociation/{id}', 'PageController@ajaxGetData')->name('pages.getassociation')->middleware('auth');
Route::get('/clearOTP', 'OTPController@clearOTP')->name('clearOTP');

Route::group(['middleware' => ['auth', 'permission']], function () {

    Route::get('/users','UserController@index')->name('users.index');
    Route::match(['get','post'],'/users/create','UserController@create')->name('users.create');
    //Route::post('/users','UserController@create')->name('users.create');
    Route::get('/users/{id}','UserController@view')->name('users.view');
    Route::match(['get','post'],'/users/{id?}/edit','UserController@edit')->name('users.edit');
    //Route::put('/users/{id}','UserController@edit')->name('users.update');
    Route::delete('/users/{id}','UserController@destroy')->name('users.delete');


    Route::get('/companies','CompanyController@index')->name('companies.index');
    Route::get('/companies/view/{id}','CompanyController@view')->name('companies.view');
    Route::match(['get', 'post'],'/companies/create','CompanyController@create')->name('companies.create');
    //Route::match(['get', 'post'],'/companies/{id}/edit','CompanyController@edit')->name('companies.edit');
    //Route::put('/companies/{id}','CompanyController@edit')->name('companies.update');
    Route::delete('/companies/{id}','CompanyController@destroy')->name('companies.delete');

    Route::get('/rolepages', 'RolePageController@index')->name('rolepageassoc.index');
    Route::match(['get','post'],'/rolepages/create', 'RolePageController@create')->name('rolepages.create');
    //Route::post('/rolepages', 'RolePageController@index')->name('rolepages.store');
    Route::get('/rolepages/{id}', 'RolePageController@show')->name('rolepages.view');
    Route::match(['get','post'],'/rolepages/{id}/edit', 'RolePageController@edit')->name('rolepages.edit');
    //Route::put('/rolepages/{id}', 'RolePageController@update')->name('rolepages.update');
    Route::delete('/rolepages/{id}', 'RolePageController@destroy')->name('rolepages.delete');


    //Route::match(['get', 'post'],'/companies/create','CompanyController@index')->name('companies.create');
    //Modules
    Route::get('modules', 'ModuleController@index')->name('modules.index');
    Route::match(['get','post'],'modules/add', 'ModuleController@create')->name('modules.create');
    //Route::post('modules/add', 'ModuleController@create')->name('modules.add');
    Route::match(['get','post'],'modules/edit/{id}', 'ModuleController@edit')->name('modules.edit');
   // Route::post('modules/edit', 'ModuleController@edit')->name('modules.edit');
    Route::get('modules/view/{id}', 'ModuleController@view')->name('modules.view');
    Route::delete('modules/destroy/{id}', 'ModuleController@destroy')->name('modules.delete');
    //Modules
    //submodules
    Route::get('submodules', 'SubModuleController@index')->name('submodules.index');
    Route::match(['get','post'],'submodules/add', 'SubModuleController@create')->name('submodules.create');
    //Route::post('submodules/add', 'SubModuleController@create')->name('submodules.create');
    Route::match(['get','post'],'submodules/edit/{id?}', 'SubModuleController@edit')->name('submodules.edit');
    //Route::post('submodules/edit', 'SubModuleController@edit')->name('submodules.edit');
    Route::get('submodules/view/{id}', 'SubModuleController@view')->name('submodules.view');
    Route::delete('submodules/destroy/{id}', 'SubModuleController@destroy')->name('submodules.delete');
    //submodules
    //settings
    Route::get('settings/edit', 'SettingController@edit')->name('sitesettings.index');
    Route::post('settings/update', 'SettingController@edit')->name('settings.update');
    //Route::get('settings/view/{id}', 'SettingController@showViewForm')->name('settings.showViewForm');
    Route::delete('settings/destroy/{id}', 'SettingController@destroy')->name('settings.delete');
    //settings
    //Roles
    Route::get('roles', 'RoleController@index')->name('roles.index');
    Route::match(['get','post'],'roles/add', 'RoleController@create')->name('roles.create');
    //Route::post('roles/add', 'RoleController@create')->name('roles.create');
    Route::match(['get','post'],'roles/edit/{id?}', 'RoleController@edit')->name('roles.edit');
    //Route::post('roles/edit', 'RoleController@edit')->name('roles.edit');
    Route::get('roles/view/{id}', 'RoleController@view')->name('roles.view');
    Route::delete('roles/destroy/{id}', 'RoleController@destroy')->name('roles.delete');
    //Roles
    //Usergroups
    Route::get('usergroups', 'UsergroupController@index')->name('usergroups.index');
    Route::match(['get','post'],'usergroups/add', 'UsergroupController@create')->name('usergroups.create');
    //Route::match(['get', 'post'],'usergroups/add', 'UsergroupController@create')->name('usergroups.create');
    Route::match(['get','post'],'usergroups/edit/{id}', 'UsergroupController@edit')->name('usergroups.edit');
    //Route::post('usergroups/edit', 'UsergroupController@edit')->name('usergroups.edit');
    Route::get('usergroups/view/{id}', 'UsergroupController@showViewForm')->name('usergroups.view');
    Route::delete('usergroups/destroy/{id}', 'UsergroupController@destroy')->name('usergroups.delete');
    //Usergroups
    //Pages
    Route::get('pages', 'PageController@index')->name('pages.index');
    Route::match(['get','post'],'pages/add', 'PageController@create')->name('pages.create');
    //Route::post('pages/add', 'PageController@create')->name('pages.create');
    Route::match(['get','post'],'pages/edit/{id?}', 'PageController@edit')->name('pages.edit');
    //Route::post('pages/edit', 'PageController@edit')->name('pages.edit');
    Route::get('pages/view/{id}', 'PageController@view')->name('pages.view');
    Route::delete('pages/destroy/{id}', 'PageController@destroy')->name('pages.delete');
    //Pages

    //UsergroupRole
    Route::get('usergroup-role-association', 'UsergroupRoleController@index')->name('usergrouprole.index');
    Route::post('usergroup-role-association/modify', 'UsergroupRoleController@index')->name('usergrouprole.modify');
//    UsergroupRole

//    UserUsergroup
    Route::get('user-usergroup-association', 'UserUsergroupController@index')->name('user.usergroup.index');
    Route::post('user-usergroup-association/modify', 'UserUsergroupController@modify')->name('user.usergroup.edit');
//    UserUsergroup

    Route::resource('timezones', 'TimezoneController');
    //Route::resource('usergroups', 'UsergroupController');
    Route::resource('usergrouproles', 'UsergroupRoleController');




///test

    Route::get('testmodule/testsubmodule/index', 'TestController@index')->name('testmodule.testsubmodule.index');
    Route::post('testmodule/testsubmodule/add', 'TestController@add')->name('testmodule.testsubmodule.add');
});
//Localization
Route::get('lang/{locale}', 'LocalizationController@index');
