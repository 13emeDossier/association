<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Menus\Entities\Menu;

class CreateAdherentsMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menu=new Menu();
        $menu->id=10;
        $menu->parent_id=0;
        $menu->label="Adherents";
        $menu->order=10;
        $menu->type=Menu::MENU_TYPES[0];
        $menu->url='adherents.index';
        $menu->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Menu::delete(10);

    }
}
