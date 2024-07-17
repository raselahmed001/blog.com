<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Category;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Models\BlogCommentReply;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $getPage = Page::getSlug('home');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home', $data);
    }
    public function about()
    {
        $getPage = Page::getSlug('about');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('about', $data);
    }
    public function teams()
    {
        $getPage = Page::getSlug('teams');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('teams',$data);
    }
    public function gallery()
    {
        $getPage = Page::getSlug('gallery');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('gallery', $data);
    }
    
    public function blog()
    {
        $getPage = Page::getSlug('blog');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        $data['getRecord'] = Blog::getRecordFront();
        return view('blog', $data);
    }
    public function contact()
    {
        $getPage = Page::getSlug('contact');
        $data['meta_title']       = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']    = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('contact', $data);
    }

    public function blogdetail($slug)
    {
         
        $getCategory = Category::getBySlug($slug);
        if(!empty($getCategory))
        {
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['header_title'] = $getCategory->title;
            $data['getRecord'] = Blog::getRecordFrontCategory($getCategory->id);
            return view('blog', $data); 
        }
        else
        {
            $getRecord = Blog::getRecordSlug($slug);
            if(($getRecord))
            {
                $data['getCategory'] = Category::getCategory();
                $data['getRecentPost'] = Blog::getRecentPost();
                $data['getRelatedPost'] = Blog::getRelatedPost($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;

                $data['meta_title'] = $getRecord->title;
                $data['meta_description'] = $getRecord->meta_description;
                $data['meta_keywords'] = $getRecord->meta_keywords;
                return view('blog_detail', $data);
            }
            else
            {
                abort(404);
            }
        }
        
    }
   
    public function blogCommentSubmit(Request $request)
    {
        $comment = new BlogComment();
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', "Comment submitted successfully.");
    }
    
    public function blogCommentReplySubmit(Request $request)
    {
        $comment = new BlogCommentReply();
        $comment->user_id = Auth::user()->id;
        $comment->comment_id = $request->comment_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', "Comment reply successfully.");
    }

    
    

    
}
