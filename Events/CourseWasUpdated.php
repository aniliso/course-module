<?php

namespace Modules\Course\Events;

use Modules\Course\Entities\Course;
use Modules\Media\Contracts\StoringMedia;

class CourseWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Course
     */
    public $course;

    public function __construct(Course $post, array $data)
    {
        $this->data = $data;
        $this->course = $post;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->course;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
