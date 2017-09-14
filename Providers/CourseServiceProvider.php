<?php

namespace Modules\Course\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Course\Composers\Backend\CategoryComposer;
use Modules\Course\Composers\Backend\LocationComposer;
use Modules\Course\Events\Handlers\RegisterCourseSidebar;
use Modules\Course\Facades\DaysOfWeekFacade;

class CourseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('Course', RegisterCourseSidebar::class)
        );

        view()->composer('course::admin.courses.*', CategoryComposer::class);
        view()->composer('course::admin.courses.*', LocationComposer::class);

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias("DaysOfWeek", DaysOfWeekFacade::class);
    }

    public function boot()
    {
        $this->publishConfig('course', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Course\Repositories\CourseRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentCourseRepository(new \Modules\Course\Entities\Course());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheCourseDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Course\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Course\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Course\Repositories\LocationRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentLocationRepository(new \Modules\Course\Entities\Location());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheLocationDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Course\Repositories\ApplicationRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentApplicationRepository(new \Modules\Course\Entities\Application());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheApplicationDecorator($repository);
            }
        );
// add bindings




    }
}
