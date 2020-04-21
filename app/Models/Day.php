<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];


    public function program(){
        return $this->belongsToMany('App\Models\Program')->withPivot(['begin_time','close_time']);
    }
    public function allocation(){
        return $this->belongsToMany('App\Models\Allocation')->withPivot(['begin_time','close_time']);
    }
}
