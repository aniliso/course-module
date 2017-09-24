<?php
namespace Modules\Course\Presenters;

use Modules\Core\Models\Status;
use Modules\Core\Presenters\BasePresenter;

class CategoryPresenter extends BasePresenter
{
    protected $zone     = 'courseCategoryImage';
    protected $slug     = 'slug';
    protected $transKey = 'course::routes.category.slug';
    protected $routeKey = 'category.slug';
}