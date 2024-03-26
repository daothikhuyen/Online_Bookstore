<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposers
{

    public function __construct(

    ) {}

    public function compose(View $view):void
    {
        $menu = Menu::select()->where('active', 1)->get();
        $view->with('menus', $menu);
    }
}
