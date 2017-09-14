<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'course__locations';
    protected $fillable = ['name', 'address'];
}
