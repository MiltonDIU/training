<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllocationEnroll extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'allocation_enrolls';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'allocation_id',
                  'name',
                  'email',
                  'mobile','address','education','remark'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the course for this model.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Allocation','allocation_id','id');
    }
    public function allocation()
    {
        return $this->belongsTo('App\Models\Allocation','allocation_id','id');
    }

    // /**
    //  * Get created_at in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getCreatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    // }

    // /**
    //  * Get updated_at in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getUpdatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    // }
    public function enrollPayment()
    {
        return $this->hasMany('App\Models\EnrollPayment');
    }
    // public $timestamps = false;
    
}
