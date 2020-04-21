<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsFormRequest;
use Exception;

class SettingsController extends Controller
{

    /**
     * Display a listing of the settings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::findOrFail(1);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new setting.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('settings.create');
    }

    /**
     * Store a new setting in the storage.
     *
     * @param App\Http\Requests\SettingsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(SettingsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            if ($request->hasFile('logo')) {
                $uploadPath = public_path('/assets/uploads/logo');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('logo')->move($uploadPath, $fileName);
                $data['logo'] = $fileName;
            }
            Setting::create($data);

            return redirect()->route('settings.setting.index')
                             ->with('success_message', trans('settings.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }
    }

    /**
     * Display the specified setting.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        

        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\SettingsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, SettingsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $setting = Setting::findOrFail($id);

            if ($request->hasFile('logo')) {
                $uploadPath = public_path('/assets/uploads/logo');
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('logo')->move($uploadPath, $fileName);
                $data['logo'] = $fileName;
                if($setting->banner!=null){
                    $existingPath = $setting->banner;
                    unlink(public_path('assets/uploads/logo'.$existingPath));
                }
            }


            $setting->update($data);

            return redirect()->route('settings.setting.index')
                             ->with('success_message', trans('settings.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified setting from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $setting = Setting::findOrFail($id);
            $setting->delete();

            return redirect()->route('settings.setting.index')
                             ->with('success_message', trans('settings.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }
    }



}
