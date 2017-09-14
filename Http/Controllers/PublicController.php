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

        return view('course::index', compact('courses'));
    }
}