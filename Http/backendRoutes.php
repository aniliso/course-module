<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/course'], function (Router $router) {
    $router->bind('course', function ($id) {
        return app('Modules\Course\Repositories\CourseRepository')->find($id);
    });
    $router->get('courses', [
        'as' => 'admin.course.course.index',
        'uses' => 'CourseController@index',
        'middleware' => 'can:course.courses.index'
    ]);
    $router->get('courses/create', [
        'as' => 'admin.course.course.create',
        'uses' => 'CourseController@create',
        'middleware' => 'can:course.courses.create'
    ]);
    $router->post('courses', [
        'as' => 'admin.course.course.store',
        'uses' => 'CourseController@store',
        'middleware' => 'can:course.courses.create'
    ]);
    $router->get('courses/{course}/edit', [
        'as' => 'admin.course.course.edit',
        'uses' => 'CourseController@edit',
        'middleware' => 'can:course.courses.edit'
    ]);
    $router->put('courses/{course}', [
        'as' => 'admin.course.course.update',
        'uses' => 'CourseController@update',
        'middleware' => 'can:course.courses.edit'
    ]);
    $router->delete('courses/{course}', [
        'as' => 'admin.course.course.destroy',
        'uses' => 'CourseController@destroy',
        'middleware' => 'can:course.courses.destroy'
    ]);
    $router->bind('courseCategory', function ($id) {
        return app('Modules\Course\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.course.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:course.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.course.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:course.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.course.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:course.categories.create'
    ]);
    $router->get('categories/{courseCategory}/edit', [
        'as' => 'admin.course.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:course.categories.edit'
    ]);
    $router->put('categories/{courseCategory}', [
        'as' => 'admin.course.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:course.categories.edit'
    ]);
    $router->delete('categories/{courseCategory}', [
        'as' => 'admin.course.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:course.categories.destroy'
    ]);
    $router->bind('location', function ($id) {
        return app('Modules\Course\Repositories\LocationRepository')->find($id);
    });
    $router->get('locations', [
        'as' => 'admin.course.location.index',
        'uses' => 'LocationController@index',
        'middleware' => 'can:course.locations.index'
    ]);
    $router->get('locations/create', [
        'as' => 'admin.course.location.create',
        'uses' => 'LocationController@create',
        'middleware' => 'can:course.locations.create'
    ]);
    $router->post('locations', [
        'as' => 'admin.course.location.store',
        'uses' => 'LocationController@store',
        'middleware' => 'can:course.locations.create'
    ]);
    $router->get('locations/{location}/edit', [
        'as' => 'admin.course.location.edit',
        'uses' => 'LocationController@edit',
        'middleware' => 'can:course.locations.edit'
    ]);
    $router->put('locations/{location}', [
        'as' => 'admin.course.location.update',
        'uses' => 'LocationController@update',
        'middleware' => 'can:course.locations.edit'
    ]);
    $router->delete('locations/{location}', [
        'as' => 'admin.course.location.destroy',
        'uses' => 'LocationController@destroy',
        'middleware' => 'can:course.locations.destroy'
    ]);
    $router->bind('application', function ($id) {
        return app('Modules\Course\Repositories\ApplicationRepository')->find($id);
    });
    $router->get('applications', [
        'as' => 'admin.course.application.index',
        'uses' => 'ApplicationController@index',
        'middleware' => 'can:course.applications.index'
    ]);
    $router->get('applications/create', [
        'as' => 'admin.course.application.create',
        'uses' => 'ApplicationController@create',
        'middleware' => 'can:course.applications.create'
    ]);
    $router->post('applications', [
        'as' => 'admin.course.application.store',
        'uses' => 'ApplicationController@store',
        'middleware' => 'can:course.applications.create'
    ]);
    $router->get('applications/{application}/edit', [
        'as' => 'admin.course.application.edit',
        'uses' => 'ApplicationController@edit',
        'middleware' => 'can:course.applications.edit'
    ]);
    $router->put('applications/{application}', [
        'as' => 'admin.course.application.update',
        'uses' => 'ApplicationController@update',
        'middleware' => 'can:course.applications.edit'
    ]);
    $router->delete('applications/{application}', [
        'as' => 'admin.course.application.destroy',
        'uses' => 'ApplicationController@destroy',
        'middleware' => 'can:course.applications.destroy'
    ]);
// append

});
