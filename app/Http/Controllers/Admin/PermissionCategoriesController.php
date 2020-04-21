<?php

namespace App\Http\Controllers\Admin;

use App\Models\PermissionCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionCategoriesFormRequest;
use Exception;
use Session;
class PermissionCategoriesController extends Controller
{

    /**
     * Display a listing of the permission categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $permissionCategories = PermissionCategory::paginate(25);

        return view('admin.permission_categories.index', compact('permissionCategories'));
    }

    /**
     * Show the form for creating a new permission category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.permission_categories.create');
    }

    /**
     * Store a new permission category in the storage.
     *
     * @param App\Http\Requests\PermissionCategoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PermissionCategoriesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            PermissionCategory::create($data);
            $notification = array(
            'message' => 'Permission Category was successfully added!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

            return redirect()->route('permission_categories.permission_category.index')
                             ->with('success_message', 'Permission Category was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }

    /**
     * Display the specified permission category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $permissionCategory = PermissionCategory::findOrFail($id);

        return view('admin.permission_categories.show', compact('permissionCategory'));
    }

    /**
     * Show the form for editing the specified permission category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $permissionCategory = PermissionCategory::findOrFail($id);
        

        return view('admin.permission_categories.edit', compact('permissionCategory'));
    }

    /**
     * Update the specified permission category in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PermissionCategoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PermissionCategoriesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $permissionCategory = PermissionCategory::findOrFail($id);
            $permissionCategory->update($data);
            $notification = array(
            'message' => 'Permission Category was successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
            return redirect()->route('permission_categories.permission_category.index')
                             ->with('success_message', 'Permission Category was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput();
        }        
    }

    /**
     * Remove the specified permission category from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $permissionCategory = PermissionCategory::findOrFail($id);
            $permissionCategory->delete();
            $notification = array(
            'message' => 'Permission Category was successfully deleted!',
            'alert-type' => 'warning'
        );
        Session::flash('notification',$notification);
            return redirect()->route('permission_categories.permission_category.index')
                             ->with('success_message', 'Permission Category was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }



}
