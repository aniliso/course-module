<?php

return [
    'course.courses' => [
        'index' => 'course::courses.list resource',
        'create' => 'course::courses.create resource',
        'edit' => 'course::courses.edit resource',
        'destroy' => 'course::courses.destroy resource',
    ],
    'course.categories' => [
        'index' => 'course::categories.list resource',
        'create' => 'course::categories.create resource',
        'edit' => 'course::categories.edit resource',
        'destroy' => 'course::categories.destroy resource',
    ],
    'course.locations' => [
        'index' => 'course::locations.list resource',
        'create' => 'course::locations.create resource',
        'edit' => 'course::locations.edit resource',
        'destroy' => 'course::locations.destroy resource',
    ],
    'course.applications' => [
        'index' => 'course::applications.list resource',
        'create' => 'course::applications.create resource',
        'edit' => 'course::applications.edit resource',
        'destroy' => 'course::applications.destroy resource',
    ],
// append




];
