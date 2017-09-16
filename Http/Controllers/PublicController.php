<?php

namespace Modules\Course\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Course\Repositories\CategoryRepository;
use Modules\Course\Repositories\CourseRepository;
use Breadcrumbs;

class PublicController extends BasePublicController
{
    private $course;
    private $category;

    private $per_page = 6;

    public function __construct(
        CourseRepository $course,
        CategoryRepository $category
    )
    {
        parent::__construct();

        $this->course = $course;
        $this->category = $category;

        view()->share('categories', $this->category->all());

        /* Start Default Breadcrumbs */
        if(!app()->runningInConsole()) {
            Breadcrumbs::register('course.index', function ($breadcrumbs) {
                $breadcrumbs->push(trans('course::courses.title.courses'), route('course.index'));
            });
        }
        /* End Default Breadcrumbs */
    }

    public function index()
    {
        $courses = $this->course->paginate($this->per_page);

        /* Start Seo */
        $this->seo()->setTitle(trans('course::courses.title.courses'))
            ->setDescription(trans('themes::course.title.description'))
            ->meta()->setUrl(route('course.index'))
            ->addMeta('robots', "index, follow")
            ->addAlternates($this->getAlternateLanguages('course::routes.course.index'));
        /* End Seo */

        return view('course::index', compact('courses'));
    }

    public function show($slug)
    {
        $course = $this->course->findBySlug($slug);

        /* Start Seo */
        $this->seo()->setTitle($course->title)
            ->setDescription($course->title)
            ->meta()->setUrl($course->present()->url)
            ->addMeta('robots', "index, follow")
            ->addAlternates($this->getAlternateLanguages('course::routes.course.slug'));
        /* End Seo */

        Breadcrumbs::register('course.slug', function ($breadcrumbs) use ($course) {
            $breadcrumbs->parent('course.index');
            if(isset($course->category->slug))
            $breadcrumbs->push($course->category->title, route('category.slug', [$course->category->slug]));
            $breadcrumbs->push($course->title, route('course.slug', $course->slug));
        });

        return view('course::view', compact('course'));
    }

    public function category($slug)
    {
        $category = $this->category->findBySlug($slug);
        $courses = $category->courses()->paginate($this->per_page);

        /* Start Seo */
        $this->seo()->setTitle($category->title)
            ->setDescription($category->title)
            ->meta()->setUrl($category->present()->url)
            ->addMeta('robots', "index, follow")
            ->addAlternates($this->getAlternateLanguages('course::routes.category.slug'));
        /* End Seo */

        Breadcrumbs::register('course.category', function ($breadcrumbs) use ($category) {
            $breadcrumbs->parent('course.index');
            $breadcrumbs->push($category->title, route('category.slug', [$category->slug]));
        });

        return view('course::category', compact('courses', 'category'));
    }
}