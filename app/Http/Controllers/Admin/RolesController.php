<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\RolesFormRequest;
use Exception;
use Session;
class RolesController extends Controller
{


    public function index()
    {
        $roles = Role::paginate(25);

        return view('admin.roles.index', compact('roles'));
    }

    public function create(Role $role)
    {
        
        $permissionsCategories = PermissionCategory::get();
        $selectedPermission = $role->permission()->pluck('permission_id')->toArray();
        return view('admin.roles.create',compact('permissionsCategories','selectedPermission'));
    }


    public function store(RolesFormRequest $request)
    {
        $permissions = $request->input('permission');
        try {
            //$requestData = $request->only(['name','slug','detail']);
            $requestData = $request->getData();
            $role = Role::create($requestData);
            $permissions = $request->input('permission_ids');
            $role->permission()->attach($permissions);
            $notification = array(
                'message' => 'Role was successfully added!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect()->route('roles.role.index')
                             ->with('success_message', 'Role was successfully added!');

        } catch (Exception $exception) {
            return back()->withInput();
        }
    }


    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissionsCategories = PermissionCategory::get();
        $selectedPermission = $role->permission()->pluck('permission_id')->toArray();
        return view('admin.roles.edit', compact('role','permissionsCategories','selectedPermission'));
    }


    public function update($id, RolesFormRequest $request)
    {


        try {
            
            $data = $request->getData();
            
            $role = Role::findOrFail($id);
            $role->update($data);

            $permissions = $request->input('permission');
            $role->permission()->sync($permissions);

            $notification = array(
            'message' => 'Role was successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
            return redirect()->route('roles.role.index')
                             ->with('success_message', 'Role was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput();
        }        
    }


    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            $notification = array(
            'message' => 'Role was successfully deleted!',
            'alert-type' => 'warning'
        );
        Session::flash('notification',$notification);
            return redirect()->route('roles.role.index')
                             ->with('success_message', 'Role was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }



}
