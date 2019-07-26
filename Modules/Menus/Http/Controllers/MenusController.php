<?php

namespace Modules\Menus\Http\Controllers;

use Modules\Menus\Entities\Menu;
use Nwidart\Modules\Routing\Controller;
use Illuminate\View\View;

class MenusController extends Controller
{
    
    public static function showMenus()
    {

        $items = Menu::tree();

        return View('menus::index')->withItems($items);

    }
}
