<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.createCategory');
    }
    public function store(Request $request)
    {
        $attributes = request()->validate([

            'category_name' => 'required|min:2'
        ]);
        $attributes = $request->all();
        Category::create($attributes);
        return redirect('/')->with('message', 'Category Addedd SuccessFully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.update', compact('category'));
    }

    public function update(Request $request){
        $id = $request->id;
        $category = Category::findOrFail($id);
   
        $request->validate([
            'category_name' => 'required|min:2',
        ]);

        $attributes=$request->all();
     
        $category->update($attributes);
        return redirect('/')->with('message','Category Updated Successfully');
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/')->with('message', 'Category deleted Successfully');
    }
}
