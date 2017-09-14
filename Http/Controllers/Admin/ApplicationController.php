<?php

namespace Modules\Course\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Entities\Application;
use Modules\Course\Http\Requests\CreateApplicationRequest;
use Modules\Course\Http\Requests\UpdateApplicationRequest;
use Modules\Course\Repositories\ApplicationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ApplicationController extends AdminBaseController
{
    /**
     * @var ApplicationRepository
     */
    private $application;

    public function __construct(ApplicationRepository $application)
    {
        parent::__construct();

        $this->application = $application;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$applications = $this->application->all();

        return view('course::admin.applications.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('course::admin.applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateApplicationRequest $request
     * @return Response
     */
    public function store(CreateApplicationRequest $request)
    {
        $this->application->create($request->all());

        return redirect()->route('admin.course.application.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('course::applications.title.applications')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Application $application
     * @return Response
     */
    public function edit(Application $application)
    {
        return view('course::admin.applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Application $application
     * @param  UpdateApplicationRequest $request
     * @return Response
     */
    public function update(Application $application, UpdateApplicationRequest $request)
    {
        $this->application->update($application, $request->all());

        return redirect()->route('admin.course.application.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('course::applications.title.applications')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Application $application
     * @return Response
     */
    public function destroy(Application $application)
    {
        $this->application->destroy($application);

        return redirect()->route('admin.course.application.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('course::applications.title.applications')]));
    }
}