<?php
namespace App;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
trait Authorizable
{

    public static function bootAuthorizable()
    {
        static::loaded( function ($model) {
            $model->fillable[] = 'role_id';
        });
    }

    public function newFromBuilder($attributes = array(), $connection = NULL)
    {
        $instance = parent::newFromBuilder($attributes);

        $instance->fireModelEvent('loaded');

        return $instance;
    }

    public static function loaded($callback, $priority = 0)
    {
        static::registerModelEvent('loaded', $callback, $priority);
    }

    public function isAuthorize($permissions,$namespace, $controller, $method, $action)
    {

        $permission = Permission::
            where('namespace', $namespace)
            ->where('controller', $controller)
            ->where('method', $method)
            ->where('action', $action)->pluck('id')->toArray();

       // dd($permission);

        $result = array_intersect($permission,$permissions);


        if (count($result) > 0) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->role_id === 1 ? true : false;
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}