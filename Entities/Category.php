<?php

namespace Modules\Course\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Course\Presenters\CategoryPresenter;

class Category extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'course__categories';
    public $translatedAttributes = ['title', 'slug'];
    protected $fillable = ['title', 'slug'];
    protected $presenter = CategoryPresenter::class;

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
