<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainlinkvisit extends Model
{
    protected $guarded = [];
    
    public function mainlink(){
        return $this->belongsTo(MainLink::class);
    }
}
