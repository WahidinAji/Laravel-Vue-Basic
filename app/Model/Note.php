<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
