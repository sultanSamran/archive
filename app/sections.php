<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    protected $fillable = [
        'section_name', 'description' , 'created_by'
    ];

    public function folders()
    {
        return $this->hasMany('App\folders');
    }

    public function documets()
    {
        return $this->hasMany('App\documets');
    }
}
