<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; //add Category Models

class CategoryController extends Controller
{
    public function index(){
        // return view('pages.tables.category_table');
        $categories = Category::all();
        return view('pages.tables.category_table', ['categories' => $categories]);
    }

    public function getCategories(){
        $categories = Category::all();

        return view('pages.tables.category_table')->with('categories', $categories);
    }

    public function save(Request $request){
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return back();
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $input = $request->all();
        $category->fill($input)->save();

        return back();
    }

    public function delete($id){
        $categories = Category::find($id);
        $categories->delete();

        return back();
    }

    public function store(Request $request)
    {
        
        if ($request->method == 'editCategory') {
            $this->editCategory($request);
        }
        
        // delete
        if ($request->method == 'deleteCategory') {
            $this->destroyCategory($request->cat_prod_id);
        }


        if ($request->method == 'completeAllTasks') {
            $this->completeAllTasks($request, $request->id);
        }
        
        if ($request->method == 'delete') {
            $this->destroy($request->id);
        }
      
        if ($request->method == 'deleteAll') {
            $this->destroyAll();
        }
        
        if ($request->method == 'addCategory')
        {
            $this->addCategory($request);
        }

        return redirect()->route('categories.index');
    }
    public function addCategory(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->cat_description;
        $category->status = $request->status;

        $category->save();

        // Add Filtering
        session()->flash('success', 'Category Successfully Added!');
        return;

    }

    public function editCategory(Request $request)
    {
        $category = Category::where('id', $request->cat_id)->first();
        $category->name = $request->name;
        $category->description = $request->cat_description;
        $category->save();

        // Edit Filtering
        session()->flash('success', 'Category Successfully Updated!');
        return;
    }

    public function categoryDetails($categoryId)
    {
        return Category::find($categoryId);
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id); // find the post with an id of 1
        $category->delete();

        // Delete Filtering
        session()->flash('success', 'Category Successfully Deleted!');
        return;
    }
}
