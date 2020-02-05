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
// Route::get('/login', function(){
//     // return redirect()->route('DashboardCourse');
//     return view('welcome');

// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\LoginController@showLoginForm');
Route::get('/course/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login')->name('LoginAdmin');
Route::post('/course/login', 'Auth\LoginController@login')->name('LoginCourse');

Route::group(['prefix'=>'admin','middleware' => ['auth','role:superadministrator|administrator']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('DashboardAdmin');
    Route::group(['prefix' => 'video'], function () {
        Route::get('/course', 'CourseVideoController@index')->name('VideoCourseViewAdmin');
        Route::get('/course/create', 'CourseVideoController@created')->name('VideoCourseCreateAdmin');
        Route::post('/course/create', 'CourseVideoController@created')->name('VideoCourseInsertAdmin');
        Route::get('/course/update/{id}', 'CourseVideoController@edit')->name('VideoCourseUpdateAdminView');
        Route::post('/course/update', 'CourseVideoController@updated')->name('VideoCourseUpdatedAdminInsert');
        Route::get('/course/delete/{id}', 'CourseVideoController@deleted')->name('VideoCourseDeletedAdmin');
    });
    Route::group(['prefix' => 'materi'], function () {
        Route::get('/course', 'CourseMateriController@index')->name('MateriCourseViewAdmin');
        Route::get('/course/create', 'CourseMateriController@create')->name('MateriCourseCreateAdmin');
        Route::post('/course/create', 'CourseMateriController@store')->name('MateriCourseInsertAdmin');
        Route::get('/course/update/{id}', 'CourseMateriController@edit')->name('MateriCourseUpdateAdminView');
        Route::post('/course/update', 'CourseMateriController@updated')->name('MateriCourseUpdatedAdminInsert');
        Route::get('/course/delete/{id}', 'CourseMateriController@destroy')->name('MateriCourseDeletedAdmin');
    });
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
    Route::get('/home','CourseController@index')->name('DashboardCourse');
    Route::group(['prefix' => 'video'], function () {
        Route::get('/', 'CourseController@VideoIndex')->name('VideoCourseIndex');
        Route::get('/list/{id}', 'CourseController@Videolist')->name('VideoCourseList');
        Route::get('/detail/{id}', 'CourseController@VideodetailCourses')->name('VideoCourseDetail');
    });
    Route::group(['prefix' => 'materi'], function () {
        Route::get('/list', 'CourseController@Materilist')->name('MateriCourseList');
        Route::get('/detail/{id}', 'CourseController@MateridetailCourses')->name('MateriCourseDetail');
    });
    Route::get('/logout', 'Auth\LoginController@logout')->name('CourseLogout');
});
