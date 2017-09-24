<?php
namespace Modules\Course\Presenters;

use Modules\Core\Models\Status;
use Modules\Core\Presenters\BasePresenter;

class CoursePresenter extends BasePresenter
{
    protected $zone     = 'courseImage';
    protected $slug     = 'slug';
    protected $transKey = 'course::routes.course.slug';
    protected $routeKey = 'course.slug';

    private $status;

    public function __construct($entity)
    {
        parent::__construct($entity);

        $this->status = app(Status::class);
    }

    public function price()
    {
        return number_format($this->entity->price, 2) . ' TL';
    }

    public function days()
    {
        $days = json_decode($this->entity->day);
        $list_days = [];
        foreach ($days as $day) {
            $list_days[] = \DaysOfWeek::get($day);
        }
        return implode(', ', $list_days);
    }

    public function capacity()
    {
        return trans('course::courses.title.person', ['person'=> $this->entity->capacity]);
    }

    public function status()
    {
        return $this->status->get($this->entity->status);
    }

    public function statusLabelClass()
    {
        switch ($this->entity->status) {
            case Status::DRAFT:
                return 'bg-red';
                break;
            case Status::PUBLISHED:
                return 'bg-green';
                break;
            default:
                return 'bg-red';
                break;
        }
    }
}