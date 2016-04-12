<?php namespace Modules\StorageCalculator\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('storagecalculator::common.title.storagecalculator'), function (Item $item) {
                $item->icon('fa fa-tasks');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('storagecalculator::packagings.title.packagings'), function (Item $item) {
                    $item->icon('fa fa-dropbox');
                    $item->weight(0);
                    $item->append('admin.storagecalculator.packaging.create');
                    $item->route('admin.storagecalculator.packaging.index');
                    $item->authorize(
                        $this->auth->hasAccess('storagecalculator.packagings.index')
                    );
                });
                $item->item(trans('storagecalculator::storages.title.storage'), function (Item $item) {
                    $item->icon('fa fa-archive');
                    $item->weight(0);
                    $item->append('admin.storagecalculator.storage.create');
                    $item->route('admin.storagecalculator.storage.index');
                    $item->authorize(
                        $this->auth->hasAccess('storagecalculator.storages.index')
                    );
                });
                $item->item(trans('storagecalculator::volumes.title.volumes'), function (Item $item) {
                    $item->icon('fa fa-cubes');
                    $item->weight(0);
                    $item->append('admin.storagecalculator.volumes.create');
                    $item->route('admin.storagecalculator.volumes.index');
                    $item->authorize(
                        $this->auth->hasAccess('storagecalculator.volumes.index')
                    );
                });
            });
        });

        return $menu;
    }
}
