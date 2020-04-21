<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{

    protected $fillable = [
        'venue_id',
        'batch_id',
        'course_id',
        'last_date',
        'course_start_date',
        'course_end_date',
        'total_hour',
        'total_class',
        'fees',
        'discount_fees',
        'is_active',
        'is_schedule',
          'batch_is_show'
    ];
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function venue(){
        return $this->belongsTo('App\Models\Venue');
    }
    public function batch(){
        return $this->belongsTo('App\Models\Batch');
    }



    public function teacher(){
        return $this->belongsToMany('App\Models\Teacher');
    }

    public function day(){
        return $this->belongsToMany('App\Models\Day')->withPivot(['begin_time','close_time']);
    }
    public function allocationEnroll(){
        return $this->hasMany('App\Models\AllocationEnroll');
    }

}
