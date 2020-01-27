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

Route::get('/', function () {
    // return view('welcome');
    if(!Auth::user()){
        return redirect()->route('LoginCourse');
    }else{
        if(Auth::user()->hasRole('superadministrator|administrator')){
            return redirect()->route('DashboardAdmin');
        }else if(Auth::user()->hasRole('user')){
            return redirect()->route('DashboardCourse');
        }
    }
});
Route::get('/login', function(){
    // return redirect()->route('DashboardCourse');
    return view('welcome');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\LoginController@showLoginForm');
Route::get('/course/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login')->name('LoginAdmin');
Route::post('/course/login', 'Auth\LoginController@login')->name('LoginCourse');

Route::group(['prefix'=>'admin','middleware' => ['auth','role:superadministrator|administrator']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('DashboardAdmin');
    Route::get('/course', 'CourseController@index')->name('CourseViewAdmin');
    Route::get('/course/create', 'CourseController@created')->name('CourseCreateAdmin');
    Route::post('/course/create', 'CourseController@created')->name('CourseInsertAdmin');
    Route::get('/course/update/{id}', 'CourseController@edit')->name('CourseUpdateAdminView');
    Route::post('/course/update', 'CourseController@updated')->name('CourseUpdatedAdminInsert');
    Route::get('/course/delete/{id}', 'CourseController@deleted')->name('CourseDeletedAdmin');
    //// Course Sub Category
    Route::get('/course/sub_category/{id}', 'SubCategoryController@index')->name('SubCategoryCourse');
    Route::get('/course/sub_category/create/{id}', 'SubCategoryController@create')->name('SubCategoryCourseAdd');
    Route::post('/course/sub_category/create/{id}', 'SubCategoryController@store')->name('SubCategoryCourseInsert');
    Route::get('/course/sub_category/update/{id}', 'SubCategoryController@edit')->name('SubCategoryCourseUpdate');
    Route::post('/course/sub_category/update', 'SubCategoryController@update')->name('SubCategoryCourseUpdateStored');
    Route::get('/course/sub_category/delete/{id}', 'SubCategoryController@destroy')->name('SubCategoryCourseDelete');


    //// User Management
    Route::get('/user-management/user','UserController@index')->name('UserManagementView');
    Route::get('/user-management/user/detail/{id}','UserController@show')->name('UserManagementViewDetail');
    Route::get('/user-management/user/create','UserController@create')->name('UserManagementCreate');
    Route::post('/user-management/user/create','UserController@store')->name('UserManagementInsert');
    Route::get('/user-management/user/reactive/{id}','UserController@activated')->name('UserManagementStatus');
    Route::get('/user-management/user/reset-password/{id}','UserController@reset_password')->name('UserManagemenetPasswordReset');
    Route::post('/user-management/user/reset-password/','UserController@reset_password')->name('UserManagemenetPasswordResetPost');
    Route::get('/user-management/user/update/{id}','UserController@edit')->name('UserManagementUpdateView');
    Route::post('/user-management/user/{id}/update','UserController@update')->name('UserManagementUpdatePost');
    Route::get('/user-management/user/delete/{id}','UserController@destroy')->name('UserManagementDelete');
    //// Role Management
    Route::get('/user-management/roles','RoleController@index')->name('RoleManagementView');
    Route::get('/user-management/roles/detail/{id}','RoleController@show')->name('RoleManagementDetail');
    Route::get('/user-management/roles/create/','RoleController@create')->name('RoleManagementCreate');
    Route::post('/user-management/roles/create','RoleController@store')->name('RoleManagementInsert');
    // Route::get('/user-management/roles/update/{id}','RoleController@edit')->name('RoleManagementEdit');
    // Route::post('/user-management/roles/update','RoleController@update')->name('RoleManagementUpdate');
    Route::get('/user-management/roles/delete/{id}','RoleController@destroy')->name('RoleManagementDelete');
    //// Kaming Suun
    // Route::get('/user-management/permission', 'PermissionController@index')->name('PermissionManagmentView');
    // Route::get('/user-management/permission/detail/{id}', 'PermissionController@show')->name('PermissionManagmentDetail');
    // Route::get('/user-management/permission/create', 'PermissionController@create')->name('PermissionManagmentCreate');
    // Route::post('/user-management/permission/create', 'PermissionController@store')->name('PermissionManagmentInsert');
    // Route::get('/user-management/permission/update/{id}', 'PermissionController@edit')->name('PermissionManagmentEdit');
    // Route::post('/user-management/permission/update/{id}', 'PermissionController@update')->name('PermissionManagmentUpdate');
    // Route::get('/user-management/permission/delete', 'PermissionController@destory')->name('PermissionManagementDelete');

    Route::get('/logout', 'Auth\LoginController@logout')->name('AdminLogout');

});

Route::group(['prefix'=>'course','middleware' => ['role:superadministrator|administrator|user','auth']], function () {
    Route::get('/home','CourseController@courseUser')->name('DashboardCourse');
    Route::get('/list/{id}', 'CourseController@list')->name('CourseList');
    Route::get('/detail/{id}', 'CourseController@detailCourses')->name('CourseDetail');
    Route::get('/logout', 'Auth\LoginController@logout')->name('CourseLogout');
});
