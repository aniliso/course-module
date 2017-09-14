<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\LocationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLocationDecorator extends BaseCacheDecorator implements LocationRepository
{
    public function __construct(LocationRepository $location)
    {
        parent::__construct();
        $this->entityName = 'course.locations';
        $this->repository = $location;
    }
}
