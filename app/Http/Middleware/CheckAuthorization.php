<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
class CheckAuthorization
{

    public function handle($request, Closure $next)
    {

        $roles = DB::table('role_user')->where('user_id', Auth::id())->get();

        $permissions = array();
        foreach ($roles as $role){
            $data = DB::table('permission_role')->where('role_id',$role->role_id)->pluck('permission_id')->toArray();
            $permissions = array_unique(array_merge($permissions,$data));

        }
        //$permissions = DB::table('permission_role')->where('role_id',1)->pluck('permission_id')->toArray();

        $actionName = $request->route()->getActionName();
        $method = $request->route()->methods()[0];
        $action = substr($actionName, strpos($actionName, '@') + 1);
        $namespace = substr($actionName, 0, strrpos($actionName, '\\'));
        $controller = substr($actionName, strrpos($actionName, '\\') + 1, -(strlen($action) + 1));
        if ($request->user()->isAdmin() || $request->user()->isAuthorize($permissions,$namespace, $controller, $method, $action)) {
            return $next($request);
        }
        return response(view('admin.errors.401'), 401);
    }
}