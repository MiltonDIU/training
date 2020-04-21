<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BatchesFormRequest;
use App\Models\Batch;
use App\Models\ProgramType;
use App\Http\Controllers\Controller;
use Exception;

class BatchesController extends Controller
{

    /**
     * Display a listing of the program types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $batches = Batch::paginate(50);

        return view('admin.batches.index',compact('batches'));
    }

    /**
     * Show the form for creating a new program type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.batches.create');
    }

    /**
     * Store a new program type in the storage.
     *
     * @param App\Http\Requests\ProgramTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(BatchesFormRequest $request)
    {
        try {
            
            $data = $request->getData();

            Batch::create($data);

            return redirect()->route('batches.batch.index')
                             ->with('success_message', 'Batch was successfully added!');

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
        $batch = Batch::findOrFail($id);

        return view('admin.batches.show', compact('batch'));
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
        $batches = Batch::findOrFail($id);
        

        return view('admin.batches.edit', compact('batches'));
    }

    /**
     * Update the specified program type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProgramTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, BatchesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $batch = Batch::findOrFail($id);
            $batch->update($data);

            return redirect()->route('batches.batch.index')
                             ->with('success_message', 'Batch was successfully updated!');

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
            $batch = Batch::findOrFail($id);
            $batch->delete();

            return redirect()->route('batches.batch.index')
                             ->with('success_message', 'Batch was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
