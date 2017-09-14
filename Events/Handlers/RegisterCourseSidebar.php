<?php

namespace Modules\Course\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterCourseSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('course::courses.title.courses'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('course::courses.title.courses'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.course.create');
                    $item->route('admin.course.course.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.courses.index')
                    );
                });
                $item->item(trans('course::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.category.create');
                    $item->route('admin.course.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.categories.index')
                    );
                });
                $item->item(trans('course::locations.title.locations'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.location.create');
                    $item->route('admin.course.location.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.locations.index')
                    );
                });
                $item->item(trans('course::applications.title.applications'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.application.create');
                    $item->route('admin.course.application.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.applications.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
