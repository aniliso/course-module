<?php

namespace Modules\Course\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Laracasts\Presenter\PresentableTrait;
use Modules\Course\Presenters\CoursePresenter;
use Modules\Media\Support\Traits\MediaRelation;

class Course extends Model
{
    use Translatable, MediaRelation, PresentableTrait;

    protected $table = 'course__courses';
    public $translatedAttributes = ['title', 'slug', 'description'];
    protected $fillable = ['title', 'slug', 'description', 'day', 'age', 'price', 'capacity', 'start_hour', 'end_hour', 'start_at', 'end_at', 'status'];
    protected $dates = ['start_at', 'end_at'];

    protected $presenter = CoursePresenter::class;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getStartEndHourAttribute()
    {
        return Carbon::parse($this->start_hour)->format('H:i') . ' - ' . Carbon::parse($this->end_hour)->format('H:i');
    }

    public function getStartEndAtAttribute()
    {
        return Carbon::parse($this->start_at)->formatLocalized('%d.%m.%Y') . ' - ' . Carbon::parse($this->end_at)->formatLocalized('%d.%m.%Y');
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = Carbon::parse($value);
    }

    public function setDayAttribute($value)
    {
        $this->attributes['day'] = json_encode($value);
    }

    public function setEndAtAttribute($value) {
        $this->attributes['end_at'] = Carbon::parse($value);
    }

    public function getTotalHourAttribute()
    {
        $start_hour = Carbon::parse($this->start_hour);
        $end_hour   = Carbon::parse($this->end_hour);
        $hour       = ($start_hour->diffInMinutes($end_hour)/60);

        $total_days = $this->start_at->diffInDaysFiltered(function (Carbon $date) {
            return in_array($date->dayOfWeek, json_decode($this->day));
        }, $this->end_at);

        $total_hour = $total_days * $hour;

        return $total_hour;
    }

    public function getTotalWeekAttribute()
    {
        return $this->start_at->diffInWeeks($this->end_at);
    }
}
