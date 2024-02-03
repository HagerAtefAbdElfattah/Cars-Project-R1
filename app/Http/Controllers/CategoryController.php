<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Car;
use App\Models\User;
use App\Notifications\AddCategoryNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'categoryName.required' => 'The Category is required',
    ];
        $data = $request->validate([
            'categoryName' => 'required|string',
        ], $messages);

        $category = Category::create($data);

        $userAdmin = User::find(Auth::user()->id);

        Notification::send($userAdmin, new AddCategoryNotification($category));


        return redirect()->route('categoriesList')->with(['success' => 'The category has been added successfuly.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, string $id)
    {
        $category = Category::FindOrFail($id);
        
        return view('admin.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, string $id)
    {
        $messages = [
            'categoryName.required' => 'The Category is required',
        ];
        $data = $request->validate([
            'categoryName' => 'required|string',
        ], $messages);

        Category::where('id', $id)->update($data);

        return redirect()->route('categoriesList')->with('success', 'The category has been updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, string $id)
    {
        $category= Car::get()->where('category_id', $id)->first();

        if ( $category) {

            return redirect()->route('categoriesList')->with('error', 'Cannot delete category with existing cars. Please remove associated cars first.');
        } else {
            
            Category::where('id', $id)->delete();

            return redirect()->route('categoriesList')->with('success', 'The category has been deleted successfuly.');
        }

        // -----using exception to hundle the query error for restrictOnDelete()-----------------------------
        
        // try {

        //     Category::where('id', $id)->delete();

        //     return redirect()->route('categoriesList');

        // } catch (QueryException $e) {

        //     if ($e->getCode() == 23000) { // Check for foreign key constraint violation

        //         return redirect()->back()->with('error','Cannot delete category with existing cars. Please remove associated cars first.');

        //     } else {

        //         throw $e; // Re-throw other exceptions
                
        //     } 
        // }
            

            
        
    }


}
