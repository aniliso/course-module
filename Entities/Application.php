<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'course__applications';
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'age', 'address1', 'address2'];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
