<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

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
                  'venue_id',
                  'category_id',
                  'name',
                  'slug',
                  'banner',
                  'detail',
                  'summary',
                  'is_active'
              ];



    public function allocation(){
        return $this->hasMany('App\Models\Allocation');
    }
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
     * Get the courseEnroll for this model.
     */


    /**
     * Get the courseTeacher for this model.
     */
    public function courseTeacher()
    {
        return $this->hasOne('App\Models\CourseTeacher','course_id','id');
    }

    /**
     * Set the start_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Set the end_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Set the class_start_time.
     *
     * @param  string  $value
     * @return void
     */
    public function setClassStartTimeAttribute($value)
    {
        $this->attributes['class_start_time'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Set the class_end_time.
     *
     * @param  string  $value
     * @return void
     */
    public function setClassEndTimeAttribute($value)
    {
        $this->attributes['class_end_time'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get start_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getStartDateAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y', $value);
    }

    /**
     * Get end_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getEndDateAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y', $value);
    }

    /**
     * Get class_start_time in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getClassStartTimeAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get class_end_time in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getClassEndTimeAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

}
