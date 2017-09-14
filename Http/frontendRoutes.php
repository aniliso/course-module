<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' =>''], function (Router $router) {
    $router->get(LaravelLocalization::transRoute('course::routes.course.index'), [
        'as'         => 'course.index',
        'uses'       => 'PublicController@index'
    ]);
    $router->get(LaravelLocalization::transRoute('course::routes.category.slug'), [
        'as'         => 'category.slug',
        'uses'       => 'PublicController@category'
    ]);
});