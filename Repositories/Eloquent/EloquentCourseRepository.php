<?php

namespace Modules\Course\Repositories\Eloquent;

use Modules\Course\Events\CourseWasCreated;
use Modules\Course\Events\CourseWasDeleted;
use Modules\Course\Events\CourseWasUpdated;
use Modules\Course\Repositories\CourseRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCourseRepository extends EloquentBaseRepository implements CourseRepository
{
    public function create($data)
    {
        $course = $this->model->create($data);

        event(new CourseWasCreated($course, $data));

        return $course;
    }

    public function update($model, $data)
    {
        $model->update($data);

        event(new CourseWasUpdated($model, $data));

        return $model;
    }

    public function destroy($model)
    {
        event(new CourseWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }


}
