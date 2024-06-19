<?php


namespace App\Http\View\Composers;
use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $menus = Menu::select('menu_id', 'menu_name', 'parent_id')->orderByDesc('menu_id')->get();

        $view->with('menus', $menus);
    }
}