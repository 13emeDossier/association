<?php

namespace Modules\Adherents\Entities;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $fillable = [];

    public function adhesions(){
        return $this->hasMany('\Modules\Adherents\Entities\Adhesion');
    }
    
    public function mails(){
        return $this->hasMany('\Modules\Adherents\Entities\AdherentMail');
    }

}
