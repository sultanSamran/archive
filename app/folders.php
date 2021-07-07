<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folders extends Model
{
    protected $fillable = [
        'folder_name', 'folder_desc' , 'section_id' , 'created_by'
    ];

    public function section()
    {
        return $this->belongsTo('App\sections');
    }
}
