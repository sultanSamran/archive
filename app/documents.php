<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $fillable = [
        'document_number', 'document_name' , 'document_date' , 'section_id', 'folder_name', 'document_image' ,'created_by'
    ];

    public function section()
    {
        return $this->belongsTo('App\sections');
    }
}
