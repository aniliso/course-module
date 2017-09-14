<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\ApplicationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheApplicationDecorator extends BaseCacheDecorator implements ApplicationRepository
{
    public function __construct(ApplicationRepository $application)
    {
        parent::__construct();
        $this->entityName = 'course.applications';
        $this->repository = $application;
    }
}
