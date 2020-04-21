<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsFormRequest;
use Exception;
use Session;
class PermissionsController extends Controller
{

    /**
     * Display a listing of the permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::with('permissioncategory')->paginate(25);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $permissionCategories = PermissionCategory::pluck('name','id')->all();
        
        return view('admin.permissions.create', compact('permissionCategories'));
    }

    /**
     * Store a new permission in the storage.
     *
     * @param App\Http\Requests\PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Permission::create($data);
            $notification = array(
            'message' => 'Permission was successfully added!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

            return redirect()->route('permissions.permission.index')
                             ->with('success_message', 'Permission was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }

    /**
     * Display the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $permission = Permission::with('permissioncategory')->findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $permissionCategories = PermissionCategory::pluck('name','id')->all();

        return view('admin.permissions.edit', compact('permission','permissionCategories'));
    }

    /**
     * Update the specified permission in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $permission = Permission::findOrFail($id);
            $permission->update($data);
            $notification = array(
            'message' => 'Permission was successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
            return redirect()->route('permissions.permission.index')
                             ->with('success_message', 'Permission was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput();
        }        
    }

    /**
     * Remove the specified permission from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            $notification = array(
            'message' => 'Permission was successfully deleted!',
            'alert-type' => 'warning'
        );
        Session::flash('notification',$notification);
            return redirect()->route('permissions.permission.index')
                             ->with('success_message', 'Permission was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }



}
