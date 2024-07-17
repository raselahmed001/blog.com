<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $data['getRecord'] = Category::getRecord();
        return view('backend.category.list', $data);

    }
    public function add_category(Request $request)
    {
        return view('backend.category.add'); 
    }
    public function insert_category(Request $request) 
    {
       
        $category = new Category;

        $category->name = ucwords(trim($request->name));
        $category->slug = ucwords(trim(Str::slug($request->name)));
        $category->title = ucwords(trim($request->title));
        $category->meta_title = ucwords(trim($request->meta_title));
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = ucwords(trim($request->meta_keywords));
        $category->status   = trim($request->status);
        $category->is_menu   = trim($request->is_menu);
        $category->save();

        return redirect('panel/category/list')->with('success', "Category successfully created.");
    }

    public function edit_category($id)
    {
        $data['getRecord'] = Category::getSingle($id);
        return view('backend.category.edit', $data); 
    }

    public function update_category(Request $request, $id)
    {
       
        
        $category = Category::getSingle($id);
        $category->name = ucwords(trim($request->name));
        $category->slug = ucwords(trim(Str::slug($request->name)));
        $category->title = ucwords(trim($request->title));
        $category->meta_title = ucwords(trim($request->meta_title));
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = ucwords(trim($request->meta_keywords));
        $category->status   = trim($request->status);
        $category->is_menu   = trim($request->is_menu);
        $category->save();

        return redirect('panel/category/list')->with('success', "Category successfully updated.");
    }

    public function delete_category($id)
    { 
        $category = Category::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with('success', "Category successfully deleted.");
        
    }

}
