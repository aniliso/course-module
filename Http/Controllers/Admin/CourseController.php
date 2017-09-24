<?php

namespace Modules\Course\Http\Controllers\Admin;

use Modules\Core\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Entities\Course;
use Modules\Course\Http\Requests\CreateCourseRequest;
use Modules\Course\Http\Requests\UpdateCourseRequest;
use Modules\Course\Repositories\CategoryRepository;
use Modules\Course\Repositories\CourseRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Course\Repositories\LocationRepository;
use Carbon\Carbon;

class CourseController extends AdminBaseController
{
    /**
     * @var CourseRepository
     */
    private $course;

    private $category;

    private $location;

    private $status;

    public function __construct(
        CourseRepository $course,
        CategoryRepository $category,
        LocationRepository $location,
        Status $status
    )
    {
        parent::__construct();

        $this->course = $course;
        $this->category = $category;
        $this->location = $location;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = $this->course->all();

        return view('course::admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = $this->status->lists();
        return view('course::admin.courses.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCourseRequest $request
     * @return Response
     */
    public function store(CreateCourseRequest $request)
    {
        if ($request->has('category_id') && $request->has('location_id')) {
            $course = $this->course->create($request->all());
            $category = $this->category->find($request->category_id);
            $course->category()->associate($category);
            $location = $this->location->find($request->location_id);
            $course->location()->associate($location);
            $course->save();
        }


        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('course::courses.title.courses')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return Response
     */
    public function edit(Course $course)
    {
        $statuses = $this->status->lists();
        return view('course::admin.courses.edit', compact('course', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Course $course
     * @param  UpdateCourseRequest $request
     * @return Response
     */
    public function update(Course $course, UpdateCourseRequest $request)
    {
        $this->course->update($course, $request->all());

        if ($request->has('category_id') && $request->has('location_id')) {

            $category = $this->category->find($request->category_id);
            $course->category()->associate($category);
            $location = $this->location->find($request->location_id);
            $course->location()->associate($location);
            $course->save();
        }

        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('course::courses.title.courses')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return Response
     */
    public function destroy(Course $course)
    {
        $this->course->destroy($course);

        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('course::courses.title.courses')]));
    }
}