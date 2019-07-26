<?php

namespace Modules\Menus\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model 
{
    //Type de menu
    public const MENU_TYPES=[0=>"route",1=>"url"];
    protected $fillable = [];
    
    public function parent() {

        return $this->hasOne(Menu::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany(Menu::class, 'parent_id', 'id');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();

    }
}
