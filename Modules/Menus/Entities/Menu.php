<?php

namespace Modules\Menus\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //Type de menu
    public const MENU_TYPES=[0=>"route",1=>"url"];
    protected $fillable = [];
}
