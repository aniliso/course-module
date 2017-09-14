<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'course.categories';
        $this->repository = $category;
    }
}
