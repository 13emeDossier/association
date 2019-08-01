<?php

namespace Modules\Adherents\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adherent extends Model
{   
    use SoftDeletes;
    protected $fillable = 
    [
        'name',
        'firstname',
        'street_number',
        'street',
        'zip',
        'city',
        'phone_number',
        'mobile_number',
    ];

    public function adhesions(){
        return $this->hasMany(Adhesion::class);
    }
    
    public function adherentsMails(){
        return $this->hasMany(AdherentsMail::class);
    }

}
