<?php

namespace Modules\Course\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Course\Entities\DaysOfWeek;

class DaysOfWeekFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DaysOfWeek::class;
    }
}