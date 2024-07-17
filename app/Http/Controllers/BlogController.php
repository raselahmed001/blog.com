<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog()
    {
        $data['getRecord'] = Blog::getRecord();
        return view('backend.blog.list',$data);

    }

    public function add_blog() 
    {
        $data['getCategory'] = Category::getCategory();
        return view('backend.blog.add', $data);
    }

    public function insert_blog(Request $request)
    {
        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->title = ucwords(trim($request->title));
        $blog->category_id = trim($request->category_id);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);
        $blog->save();

        $slug = Str::slug($request->title);
        $checkSlug = Blog::where('slug', '=', $slug)->first();
        if(!empty($checkSlug))
        {
            $dbslug = $slug. '-'.$blog->id;
        }
        else
        {
            $dbslug = $slug;
        }
        $blog->slug = $dbslug;
        if(!empty($request->file('image_file')))
        {
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $dbslug. '.'.$ext;
            $file->move('upload/blog/', $filename);
            $blog->image_file = $filename;
        }
        $blog->save();
        BlogTag::InsertDeleteTags($blog->id, $request->tags);
        return redirect('panel/blog/list')->with('success', 'Blog successfully created.');
    }

    public function edit_blog($id)
    {
        $data['getCategory'] = Category::getCategory();
        $data['getRecord'] = Blog::getSingle($id);
        return view('backend.blog.edit', $data); 
    }

    
    public function update_blog(Request $request, $id)
    {
        $blog = Blog::getSingle($id);
        $blog->title = ucwords(trim($request->title));
        $blog->category_id = trim($request->category_id);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);

        if(!empty($request->file('image_file')))
        {
            if(!empty($blog->getImage()))
            {
                unlink('upload/blog/'.$blog->image_file);
            }
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $blog->slug. '.'.$ext;
            $file->move('upload/blog/', $filename);
            $blog->image_file = $filename;
        }
        $blog->save();
        BlogTag::InsertDeleteTags($blog->id, $request->tags);
        return redirect('panel/blog/list')->with('success', 'Blog successfully updated.');
    }

    public function delete_blog($id)
    { 
        $blog = Blog::getSingle($id);
        $blog->is_delete = 1;
        $blog->save();
        return redirect()->back()->with('success', "Blog successfully deleted.");
        
    }

    public function BlogDataTable()
    {
        $data['getRecord'] = Blog::getRecord();
        return view('backend.blog.blog_data_table',$data);
    }

}
