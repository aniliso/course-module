<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'slug'];
    protected $table = 'course__category_translations';
}
