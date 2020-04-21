<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollPayment extends Model
{
    protected $fillable = [
        'allocation_enroll_id',
        'payment_type',
        'amount',
        'is_online',
        'transaction'
    ];

    public function venue()
    {
        return $this->belongsTo('App\Models\AllocationEnroll');
    }
}
