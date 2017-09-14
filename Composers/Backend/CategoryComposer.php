<?php

namespace Modules\Course\Composers\Backend;


use Illuminate\Contracts\View\View;
use Modules\Course\Repositories\CategoryRepository;

class CategoryComposer
{
    private $category;
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $categories = $this->category->all()->pluck('title', 'id')->toArray();
        $view->with('selectCategories', $categories);
    }
}