<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
                  'username',
                  'identical',
                  'email',
                  'password',
                  'remember_token'
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
     * Get the address for this model.
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address','user_id','id');
    }

    /**
     * Get the applicant for this model.
     */
    public function applicant()
    {
        return $this->hasOne('App\Models\Applicant','user_id','id');
    }

    /**
     * Get the award for this model.
     */
    public function award()
    {
        return $this->hasOne('App\Models\Award','user_id','id');
    }

    /**
     * Get the commentLike for this model.
     */
    public function commentLike()
    {
        return $this->hasOne('App\Models\CommentLike','user_id','id');
    }

    /**
     * Get the comment for this model.
     */
    public function comment()
    {
        return $this->hasOne('App\Models\Comment','user_id','id');
    }

    /**
     * Get the committee for this model.
     */
    public function committee()
    {
        return $this->hasOne('App\Models\Committee','user_id','id');
    }

    /**
     * Get the conversation for this model.
     */
    public function conversation()
    {
        return $this->hasOne('App\Models\Conversation','send_id','id');
    }

    /**
     * Get the education for this model.
     */
    public function education()
    {
        return $this->hasOne('App\Models\Education','user_id','id');
    }

    /**
     * Get the experience for this model.
     */
    public function experience()
    {
        return $this->hasOne('App\Models\Experience','user_id','id');
    }

    /**
     * Get the hobbyUser for this model.
     */
    public function hobbyUser()
    {
        return $this->hasOne('App\Models\HobbyUser','user_id','id');
    }

    /**
     * Get the like for this model.
     */
    public function like()
    {
        return $this->hasOne('App\Models\Like','user_id','id');
    }

    /**
     * Get the post for this model.
     */
    public function post()
    {
        return $this->hasOne('App\Models\Post','user_id','id');
    }

    /**
     * Get the profile for this model.
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id','id');
    }

    /**
     * Get the share for this model.
     */
    public function share()
    {
        return $this->hasOne('App\Models\Share','user_id','id');
    }

    /**
     * Get the skillUser for this model.
     */
    public function skillUser()
    {
        return $this->hasOne('App\Models\SkillUser','user_id','id');
    }

    /**
     * Get the tagUser for this model.
     */
    public function tagUser()
    {
        return $this->hasOne('App\Models\TagUser','user_id','id');
    }

    /**
     * Get the tag for this model.
     */
    public function tag()
    {
        return $this->hasOne('App\Models\Tag','user_id','id');
    }

    /**
     * Get the training for this model.
     */
    public function training()
    {
        return $this->hasOne('App\Models\Training','user_id','id');
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
    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
