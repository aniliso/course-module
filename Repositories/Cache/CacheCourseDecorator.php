<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\CourseRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCourseDecorator extends BaseCacheDecorator implements CourseRepository
{
    public function __construct(CourseRepository $course)
    {
        parent::__construct();
        $this->entityName = 'course.courses';
        $this->repository = $course;
    }
}
