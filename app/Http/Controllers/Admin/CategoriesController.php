<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesFormRequest;
use Exception;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     *
     */
    public function index()
    {
        $categories = Category::paginate(25);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     */
    public function create()
    {
        
        
        return view('admin.categories.create');
    }

    /**
     * Store a new category in the storage.
     *
     */
    public function store(CategoriesFormRequest $request)
    {

        try {
            
            $data = $request->getData();
            Category::create($data);
            return redirect()->route('categories.category.index')
                             ->with('success_message', 'Category was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the storage.
     *
     * @param  int $id
     */
    public function update($id, CategoriesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $category = Category::findOrFail($id);
            $category->update($data);

            return redirect()->route('categories.category.index')
                             ->with('success_message', 'Category was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param  int $id
     *
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.category.index')
                             ->with('success_message', 'Category was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display a listing of the categories beforehand soft deleted
     *
     */
public function trust(){
    $trashedAndNotTrashed = Model::withTrashed()->get();
    //$categories = Category::onlyTrashed()->get();
}


}
