<?php

namespace App\Http\Controllers\Admin;

use App\Models\Venue;
use App\Http\Controllers\Controller;
use App\Http\Requests\VenuesFormRequest;
use Exception;

class VenuesController extends Controller
{

    /**
     * Display a listing of the venues.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $venues = Venue::paginate(25);

        return view('admin.venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new venue.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.venues.create');
    }

    /**
     * Store a new venue in the storage.
     *
     * @param App\Http\Requests\VenuesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(VenuesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;
            }
            Venue::create($data);

            return redirect()->route('venues.venue.index')
                             ->with('success_message', 'Venue was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified venue.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);

        return view('admin.venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified venue.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        

        return view('admin.venues.edit', compact('venue'));
    }

    /**
     * Update the specified venue in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\VenuesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, VenuesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $venue = Venue::findOrFail($id);
            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;

                if($venue->banner!=null){
                    $existingPath = $venue->banner;
                    unlink(public_path('assets/uploads/banner/'.$existingPath));
                }

            }


            $venue->update($data);

            return redirect()->route('venues.venue.index')
                             ->with('success_message', 'Venue was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified venue from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $venue = Venue::findOrFail($id);
            $venue->delete();

            return redirect()->route('venues.venue.index')
                             ->with('success_message', 'Venue was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
