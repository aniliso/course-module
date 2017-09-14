<?php namespace Modules\Course\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Course\Events\CourseWasCreated;
use Modules\Course\Events\CourseWasDeleted;
use Modules\Course\Events\CourseWasUpdated;
use Modules\Media\Events\Handlers\HandleMediaStorage;
use Modules\Media\Events\Handlers\RemovePolymorphicLink;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
      CourseWasCreated::class => [
          HandleMediaStorage::class
      ],
      CourseWasUpdated::class => [
          HandleMediaStorage::class
      ],
      CourseWasDeleted::class => [
          RemovePolymorphicLink::class
      ]
    ];
}