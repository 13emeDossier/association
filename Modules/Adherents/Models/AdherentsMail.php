<?php

namespace Modules\Adherents\Models;

use Illuminate\Database\Eloquent\Model;

class AdherentsMail extends Model
{
    protected $fillable = [
        'email',
        'usage'
    ];

    
}
