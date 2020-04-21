<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgramType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramTypesFormRequest;
use Exception;

class ProgramTypesController extends Controller
{

    /**
     * Display a listing of the program types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $programTypes = ProgramType::paginate(25);

        return view('admin.program_types.index', compact('programTypes'));
    }

    /**
     * Show the form for creating a new program type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.program_types.create');
    }

    /**
     * Store a new program type in the storage.
     *
     * @param App\Http\Requests\ProgramTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProgramTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ProgramType::create($data);

            return redirect()->route('program_types.program_type.index')
                             ->with('success_message', 'Program Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified program type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $programType = ProgramType::findOrFail($id);

        return view('admin.program_types.show', compact('programType'));
    }

    /**
     * Show the form for editing the specified program type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $programType = ProgramType::findOrFail($id);
        

        return view('admin.program_types.edit', compact('programType'));
    }

    /**
     * Update the specified program type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProgramTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProgramTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $programType = ProgramType::findOrFail($id);
            $programType->update($data);

            return redirect()->route('program_types.program_type.index')
                             ->with('success_message', 'Program Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified program type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $programType = ProgramType::findOrFail($id);
            $programType->delete();

            return redirect()->route('program_types.program_type.index')
                             ->with('success_message', 'Program Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
