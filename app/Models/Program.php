<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'programs';

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
                  'name',
                  'slug',
                  'venue_id',
                  'category_id',
                  'program_type_id',
                  'banner',
                  'summary',
                  'details',
                  'is_paid',
                  'fees',
                  'begin_date',
                  'close_date',
                  'is_active'
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
     * Get the venue for this model.
     */
    public function venue()
    {
        return $this->belongsTo('App\Models\Venue','venue_id','id');
    }

    /**
     * Get the category for this model.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    /**
     * Get the programType for this model.
     */
    public function programType()
    {
        return $this->belongsTo('App\Models\ProgramType','program_type_id','id');
    }

    /**
     * Get the programVenue for this model.
     */
    public function programVenue()
    {
        return $this->hasOne('App\Models\ProgramVenue','program_id','id');
    }
    public function programEnroll()
    {
        return $this->hasMany('App\Models\ProgramEnroll','program_id','id');
    }
    public function teacher(){
        return $this->belongsToMany('App\Models\Teacher');
    }
    public function day(){
        return $this->belongsToMany('App\Models\Day')->withPivot(['begin_time','close_time']);
    }
    /**
     * Set the program_start_date.
     *
     * @param  string  $value
     * @return void
     */


    /**
     * Set the program_end_date.
     *
     * @param  string  $value
     * @return void
     */


}
