<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mainlinkvisits(){
        return $this->hasMany(mainlinkvisit::class);
    }
    
    public function latest_mainlinkvisit()
    {
        return $this->hasOne(mainlinkvisit::class)->latest();
    }
}
