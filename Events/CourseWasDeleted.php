<?php

namespace Modules\Course\Events;

use Modules\Media\Contracts\DeletingMedia;

class CourseWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $courseClass;
    /**
     * @var int
     */
    private $courseId;

    public function __construct($courseId, $courseClass)
    {
        $this->courseClass = $courseClass;
        $this->courseId = $courseId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->courseId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->courseClass;
    }
}
