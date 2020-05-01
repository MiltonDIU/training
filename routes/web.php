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

Auth::routes(['verify' => true]);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});

/*
|--------------------------------------------------------------------------
| Index Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'SiteController@index')->name('index');
Route::get('/online-course', 'SiteController@onlineCourse')->name('onlineCourse');

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/
Route::get('/contact', 'ContactController@index')->name('contact');

/*
|--------------------------------------------------------------------------
| Workshop List Routes
|--------------------------------------------------------------------------
*/
//Route::get('/workshops', 'WorkshopController@index')->name('workshops');
//Route::get('/workshops/{slug}', 'WorkshopController@show')->name('workshops.show');
/*
|--------------------------------------------------------------------------
| Seminar List Routes
|--------------------------------------------------------------------------
*/
//Route::get('/seminars', 'SeminarController@index')->name('seminars');
//Route::get('/seminars/{slug}', 'WorkshopController@show')->name('seminars.show');
/*
|--------------------------------------------------------------------------
| Course Routes
|--------------------------------------------------------------------------
*/

Route::get('/courses/category/{category}', 'CourseController@category')->name('courses.category');

Route::get('/courses', 'CourseController@index')->name('courses');
Route::get('/courses/{id}/{slug}', 'CourseController@show')->name('courses.show');

Route::get('/thank-you', 'SiteController@thankYou')->name('tanks');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
*/
Route::post('/search', 'SearchController@search')->name('search');
/*
|--------------------------------------------------------------------------
| Enroll Routes
|--------------------------------------------------------------------------
*/
Route::get('/rp/{id}/{name}', 'CourseController@teacherView');

/*
|--------------------------------------------------------------------------
| Teacher profile view resort
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Admin User Permission Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => Config("authorization.route-prefix"),
    'middleware' => ['web', 'auth', 'verified']],
    function () {
        Route::group(['middleware' => Config("authorization.middleware")], function () {
            /*
            |--------------------------------------------------------------------------
            | Permission Category Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'permission-categories',
                ], function () {

                Route::get('/', 'Admin\\PermissionCategoriesController@index')
                    ->name('permission_categories.permission_category.index');

                Route::get('/create', 'Admin\\PermissionCategoriesController@create')
                    ->name('permission_categories.permission_category.create');

                Route::get('/show/{permissionCategory}', 'Admin\\PermissionCategoriesController@show')
                    ->name('permission_categories.permission_category.show')
                    ->where('id', '[0-9]+');

                Route::get('/{permissionCategory}/edit', 'Admin\\PermissionCategoriesController@edit')
                    ->name('permission_categories.permission_category.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\PermissionCategoriesController@store')
                    ->name('permission_categories.permission_category.store');

                Route::put('permission_category/{permissionCategory}', 'Admin\\PermissionCategoriesController@update')
                    ->name('permission_categories.permission_category.update')
                    ->where('id', '[0-9]+');

                Route::delete('/permission_category/{permissionCategory}', 'Admin\\PermissionCategoriesController@destroy')
                    ->name('permission_categories.permission_category.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Permission Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'permissions',
                ], function () {

                Route::get('/', 'Admin\\PermissionsController@index')
                    ->name('permissions.permission.index');

                Route::get('/create', 'Admin\\PermissionsController@create')
                    ->name('permissions.permission.create');

                Route::get('/show/{permission}', 'Admin\\PermissionsController@show')
                    ->name('permissions.permission.show')
                    ->where('id', '[0-9]+');

                Route::get('/{permission}/edit', 'Admin\\PermissionsController@edit')
                    ->name('permissions.permission.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\PermissionsController@store')
                    ->name('permissions.permission.store');

                Route::put('permission/{permission}', 'Admin\\PermissionsController@update')
                    ->name('permissions.permission.update')
                    ->where('id', '[0-9]+');

                Route::delete('/permission/{permission}', 'Admin\\PermissionsController@destroy')
                    ->name('permissions.permission.destroy')
                    ->where('id', '[0-9]+');

            });

            /*
            |--------------------------------------------------------------------------
            | Admin User Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'users',
                ], function () {

                Route::get('/', 'Admin\\UsersController@index')
                    ->name('users.user.index')->middleware('verified');

                Route::get('/create', 'Admin\\UsersController@create')
                    ->name('users.user.create');

                Route::get('/show/{user}', 'Admin\\UsersController@show')
                    ->name('users.user.show')
                    ->where('id', '[0-9]+');

                Route::get('/{user}/edit', 'Admin\\UsersController@edit')
                    ->name('users.user.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\UsersController@store')
                    ->name('users.user.store');

                Route::put('user/{user}', 'Admin\\UsersController@update')
                    ->name('users.user.update')
                    ->where('id', '[0-9]+');

                Route::delete('/user/{user}', 'Admin\\UsersController@destroy')
                    ->name('users.user.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Roles Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'roles',
                ], function () {

                Route::get('/', 'Admin\\RolesController@index')->name('roles.role.index');

                Route::get('/create', 'Admin\\RolesController@create')
                    ->name('roles.role.create');

                Route::get('/show/{role}', 'Admin\\RolesController@show')
                    ->name('roles.role.show')
                    ->where('id', '[0-9]+');

                Route::get('/{role}/edit', 'Admin\\RolesController@edit')
                    ->name('roles.role.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\RolesController@store')
                    ->name('roles.role.store');

                Route::put('role/{role}', 'Admin\\RolesController@update')
                    ->name('roles.role.update')
                    ->where('id', '[0-9]+');

                Route::delete('/role/{role}', 'Admin\\RolesController@destroy')
                    ->name('roles.role.destroy')
                    ->where('id', '[0-9]+');

            });

            /*
            |--------------------------------------------------------------------------
            | Admin Settings Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'settings',
                ], function () {

                Route::get('/', 'Admin\\SettingsController@index')
                    ->name('settings.setting.index');

                Route::get('/create', 'Admin\\SettingsController@create')
                    ->name('settings.setting.create');

                Route::get('/show/{setting}', 'Admin\\SettingsController@show')
                    ->name('settings.setting.show')
                    ->where('id', '[0-9]+');

                Route::get('/{setting}/edit', 'Admin\\SettingsController@edit')
                    ->name('settings.setting.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\SettingsController@store')
                    ->name('settings.setting.store');

                Route::put('setting/{setting}', 'Admin\\SettingsController@update')
                    ->name('settings.setting.update')
                    ->where('id', '[0-9]+');

                Route::delete('/setting/{setting}', 'Admin\\SettingsController@destroy')
                    ->name('settings.setting.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Categories Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'categories',
                ], function () {

                Route::get('/', 'Admin\\CategoriesController@index')
                    ->name('categories.category.index');

                Route::get('/create', 'Admin\\CategoriesController@create')
                    ->name('categories.category.create');

                Route::get('/show/{category}', 'Admin\\CategoriesController@show')
                    ->name('categories.category.show')
                    ->where('id', '[0-9]+');

                Route::get('/{category}/edit', 'Admin\\CategoriesController@edit')
                    ->name('categories.category.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\\CategoriesController@store')
                    ->name('categories.category.store');

                Route::put('category/{category}', 'Admin\\CategoriesController@update')
                    ->name('categories.category.update')
                    ->where('id', '[0-9]+');

                Route::delete('/category/{category}', 'Admin\\CategoriesController@destroy')
                    ->name('categories.category.destroy')
                    ->where('id', '[0-9]+');

            });

            /*
            |--------------------------------------------------------------------------
            | Admin Teacher Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'teachers',
                ], function () {

                Route::get('/', 'Admin\TeachersController@index')
                    ->name('teachers.teacher.index');

                Route::get('/create', 'Admin\TeachersController@create')
                    ->name('teachers.teacher.create');

                Route::get('/show/{teacher}', 'Admin\TeachersController@show')
                    ->name('teachers.teacher.show')
                    ->where('id', '[0-9]+');

                Route::get('/{teacher}/edit', 'Admin\TeachersController@edit')
                    ->name('teachers.teacher.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\TeachersController@store')
                    ->name('teachers.teacher.store');

                Route::put('teacher/{teacher}', 'Admin\TeachersController@update')
                    ->name('teachers.teacher.update')
                    ->where('id', '[0-9]+');

                Route::delete('/teacher/{teacher}', 'Admin\TeachersController@destroy')
                    ->name('teachers.teacher.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Venue Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'venues',
                ], function () {

                Route::get('/', 'Admin\VenuesController@index')
                    ->name('venues.venue.index');

                Route::get('/create', 'Admin\VenuesController@create')
                    ->name('venues.venue.create');

                Route::get('/show/{venue}', 'Admin\VenuesController@show')
                    ->name('venues.venue.show')
                    ->where('id', '[0-9]+');

                Route::get('/{venue}/edit', 'Admin\VenuesController@edit')
                    ->name('venues.venue.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\VenuesController@store')
                    ->name('venues.venue.store');

                Route::put('venue/{venue}', 'Admin\VenuesController@update')
                    ->name('venues.venue.update')
                    ->where('id', '[0-9]+');

                Route::delete('/venue/{venue}', 'Admin\VenuesController@destroy')
                    ->name('venues.venue.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Course Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'courses',
                ], function () {

                Route::get('/', 'Admin\CoursesController@index')
                    ->name('courses.course.index');

                Route::get('/create', 'Admin\CoursesController@create')
                    ->name('courses.course.create');

                Route::get('/show/{course}', 'Admin\CoursesController@show')
                    ->name('courses.course.show')
                    ->where('id', '[0-9]+');

                Route::get('/{course}/edit', 'Admin\CoursesController@edit')
                    ->name('courses.course.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\CoursesController@store')
                    ->name('courses.course.store');

                Route::put('course/{course}', 'Admin\CoursesController@update')
                    ->name('courses.course.update')
                    ->where('id', '[0-9]+');

                Route::delete('/course/{course}', 'Admin\CoursesController@destroy')
                    ->name('courses.course.destroy')
                    ->where('id', '[0-9]+');

                //custom method
                Route::get('/{id}/{course}', 'Admin\CoursesController@enroll')
                    ->name('courses.course.enroll')
                    ->where('id', '[0-9]+');

                Route::get('/assign-course', 'Admin\CoursesController@assign')
                    ->name('courses.course.assign');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Enroll Course Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'allocation_enrolls',
                ], function () {

                Route::get('/', 'Admin\AllocationEnrollsController@index')
                    ->name('allocation_enrolls.allocation_enroll.index');

                Route::get('/create', 'Admin\AllocationEnrollsController@create')
                    ->name('allocation_enrolls.allocation_enroll.create');

                Route::get('/show/{allocationEnroll}', 'Admin\AllocationEnrollsController@show')
                    ->name('allocation_enrolls.allocation_enroll.show')
                    ->where('id', '[0-9]+');

                Route::get('/{allocationEnroll}/edit', 'Admin\AllocationEnrollsController@edit')
                    ->name('allocation_enrolls.allocation_enroll.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\AllocationEnrollsController@store')
                    ->name('allocation_enrolls.allocation_enroll.store');

                Route::put('allocation_enroll/{allocationEnroll}', 'Admin\AllocationEnrollsController@update')
                    ->name('allocation_enrolls.allocation_enroll.update')
                    ->where('id', '[0-9]+');

                Route::delete('/allocation_enroll/{allocationEnroll}', 'Admin\AllocationEnrollsController@destroy')
                    ->name('allocation_enrolls.allocation_enroll.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Program Type Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'program_types',
                ], function () {

                Route::get('/', 'Admin\ProgramTypesController@index')
                    ->name('program_types.program_type.index');

                Route::get('/create', 'Admin\ProgramTypesController@create')
                    ->name('program_types.program_type.create');

                Route::get('/show/{programType}', 'Admin\ProgramTypesController@show')
                    ->name('program_types.program_type.show')
                    ->where('id', '[0-9]+');

                Route::get('/{programType}/edit', 'Admin\ProgramTypesController@edit')
                    ->name('program_types.program_type.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\ProgramTypesController@store')
                    ->name('program_types.program_type.store');

                Route::put('program_type/{programType}', 'Admin\ProgramTypesController@update')
                    ->name('program_types.program_type.update')
                    ->where('id', '[0-9]+');

                Route::delete('/program_type/{programType}', 'Admin\ProgramTypesController@destroy')
                    ->name('program_types.program_type.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Batches Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'batches',
                ], function () {

                Route::get('/', 'Admin\BatchesController@index')
                    ->name('batches.batch.index');

                Route::get('/create', 'Admin\BatchesController@create')
                    ->name('batches.batch.create');

                Route::get('/show/{batch}', 'Admin\BatchesController@show')
                    ->name('batches.batch.show')
                    ->where('id', '[0-9]+');

                Route::get('/{batch}/edit', 'Admin\BatchesController@edit')
                    ->name('batches.batch.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\BatchesController@store')
                    ->name('batches.batch.store');

                Route::put('batches/{batch}', 'Admin\BatchesController@update')
                    ->name('batches.batch.update')
                    ->where('id', '[0-9]+');

                Route::delete('/batches/{batch}', 'Admin\BatchesController@destroy')
                    ->name('batches.batch.destroy')
                    ->where('id', '[0-9]+');

            });
            /*
            |--------------------------------------------------------------------------
            | Admin Program Enroll Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'program_enrolls',
                ], function () {

                Route::get('/', 'Admin\ProgramEnrollsController@index')
                    ->name('program_enrolls.program_enroll.index');

                Route::get('/create', 'Admin\ProgramEnrollsController@create')
                    ->name('program_enrolls.program_enroll.create');

                Route::get('/show/{programEnroll}', 'Admin\ProgramEnrollsController@show')
                    ->name('program_enrolls.program_enroll.show')
                    ->where('id', '[0-9]+');

                Route::get('/{programEnroll}/edit', 'Admin\ProgramEnrollsController@edit')
                    ->name('program_enrolls.program_enroll.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\ProgramEnrollsController@store')
                    ->name('program_enrolls.program_enroll.store');

                Route::put('program_enroll/{programEnroll}', 'Admin\ProgramEnrollsController@update')
                    ->name('program_enrolls.program_enroll.update')
                    ->where('id', '[0-9]+');

                Route::delete('/program_enroll/{programEnroll}', 'Admin\ProgramEnrollsController@destroy')
                    ->name('program_enrolls.program_enroll.destroy')
                    ->where('id', '[0-9]+');

            });

            /*
            |--------------------------------------------------------------------------
            | Admin Program Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'programs',
                ], function () {

                Route::get('/', 'Admin\ProgramsController@index')
                    ->name('programs.program.index');

                Route::get('/create', 'Admin\ProgramsController@create')
                    ->name('programs.program.create');

                Route::get('/show/{program}', 'Admin\ProgramsController@show')
                    ->name('programs.program.show')
                    ->where('id', '[0-9]+');

                Route::get('/{program}/edit', 'Admin\ProgramsController@edit')
                    ->name('programs.program.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\ProgramsController@store')
                    ->name('programs.program.store');

                Route::put('program/{program}', 'Admin\ProgramsController@update')
                    ->name('programs.program.update')
                    ->where('id', '[0-9]+');

                Route::delete('/program/{program}', 'Admin\ProgramsController@destroy')
                    ->name('programs.program.destroy')
                    ->where('id', '[0-9]+');

            });

            /*
            |--------------------------------------------------------------------------
            | Admin Allocation Routes
            |--------------------------------------------------------------------------
            */
            Route::group(
                [
                    'prefix' => 'allocations',
                ], function () {

                Route::get('/', 'Admin\AllocationsController@index')
                    ->name('allocations.allocation.index');

                Route::get('/create', 'Admin\AllocationsController@create')
                    ->name('allocations.allocation.create');

                Route::get('/show/{allocation}', 'Admin\AllocationsController@show')
                    ->name('allocations.allocation.show')
                    ->where('id', '[0-9]+');

                Route::get('/{allocation}/edit', 'Admin\AllocationsController@edit')
                    ->name('allocations.allocation.edit')
                    ->where('id', '[0-9]+');

                Route::post('/', 'Admin\AllocationsController@store')
                    ->name('allocations.allocation.store');

                Route::put('allocations/{allocation}', 'Admin\AllocationsController@update')
                    ->name('allocations.allocation.update')
                    ->where('id', '[0-9]+');

                Route::delete('/allocations/{allocation}', 'Admin\AllocationsController@destroy')
                    ->name('allocations.allocation.destroy')
                    ->where('id', '[0-9]+');

            });

        });
        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard Routes
        |--------------------------------------------------------------------------
        */
        Route::get('/', 'Admin\\DashboardController@index');
        /*
        |--------------------------------------------------------------------------
        | Admin Profile Routes
        |--------------------------------------------------------------------------
        */
        Route::get('/profile', 'Admin\\DashboardController@profile');
        Route::get('/profile/password', 'Admin\\DashboardController@password')->name('dashboard.profile.password');
        Route::post('/profile/passwordChange', 'Admin\\DashboardController@passwordChange')->name('dashboard.user.passwordChange');
        Route::get('/profile/avatar', 'Admin\\DashboardController@avatar')->name('admin.users.avatar');
        Route::post('/profile/avatarUpdate', 'Admin\\DashboardController@avatarUpdate')->name('dashboard.user.avatarUpdate');
    });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/program/{id}/{course}', 'Admin\ProgramsController@enroll')
    ->name('programs.program.enroll')
    ->where('id', '[0-9]+');
/*
|--------------------------------------------------------------------------
| Program Routes
|--------------------------------------------------------------------------
*/
Route::get('/program', 'ProgramController@index')->name('program.all');
Route::get('/program/{program}', 'ProgramController@index')->name('program.index');
Route::get('/program/{program}/{id}/{slug}', 'ProgramController@show')->name('program.show');


/*
|--------------------------------------------------------------------------
| Batch wise student enroll Routes
|--------------------------------------------------------------------------
*/
Route::get('/enroll/{id}/{slug}', 'CourseController@enrollForm')->name('enroll.form');
Route::post('/enrollStore', 'CourseController@enrollStore')->name('enrolls.enrollStore');
/*
|--------------------------------------------------------------------------
| program wise student enroll Routes
|--------------------------------------------------------------------------
*/
Route::get('/program/{id}/{slug}', 'ProgramController@enrollForm')->name('program.enroll.form');
Route::post('/program-enroll', 'ProgramController@enrollStore')->name('program.enroll.enrollStore');