<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
                  'permission_category_id',
                  'namespace',
                  'controller',
                  'method',
                  'action',
                  'display',
                  'allowed',
                  'detail'
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
     * Get the permissionCategory for this model.
     */
    public function permissionCategory()
    {
        return $this->belongsTo('App\Models\PermissionCategory','permission_category_id','id');
    }

    /**
     * Get the permissionRole for this model.
     */
    public function permissionRole()
    {
        return $this->hasOne('App\Models\PermissionRole','permission_id','id');
    }
    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
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

}
