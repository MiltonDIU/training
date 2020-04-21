<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use Exception;
use Session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create(User $user)
    {
        
        $roles = Role::all();
        $selectedRoles = $user->role()->pluck('role_id')->toArray();

        return view('admin.users.create',compact('roles','selectedRoles'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param App\Http\Requests\UsersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(UsersFormRequest $request)
    {
        try {
            $data = $request->only(['name','username','identical','email']);
            $data['password'] = Hash::make($request->input('password'));
            $user = User::create($data);
            $roles = $request->input('role_ids');
            $user->role()->attach($roles);

            $notification = array(
            'message' => 'User was successfully added!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $selectedRoles = $user->role()->pluck('role_id')->toArray();

        return view('admin.users.edit', compact('user','roles','selectedRoles'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\UsersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, UsersFormRequest $request)
    {
        try {
            
            $data = $request->only(['name','username','identical','email']);
            $data['password'] = Hash::make($request->input('password'));
            $user = User::findOrFail($id);
            $user->update($data);
            $roles = $request->input('role_ids');

            $user->role()->sync($roles);
            $notification = array(
            'message' => 'User was successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput();
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            $notification = array(
            'message' => 'User was successfully deleted!',
            'alert-type' => 'warning'
        );
        Session::flash('notification',$notification);
            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput();
        }
    }



}
