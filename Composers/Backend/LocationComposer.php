<?php
namespace Modules\Course\Composers\Backend;


use Illuminate\Contracts\View\View;
use Modules\Course\Repositories\LocationRepository;

class LocationComposer
{
    private $location;
    public function __construct(LocationRepository $location)
    {
        $this->location = $location;
    }
    public function compose(View $view)
    {
        $locations = $this->location->all()->pluck('name', 'id')->toArray();
        $view->with('selectLocations', $locations);
    }
}