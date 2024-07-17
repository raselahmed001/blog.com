<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page()
    {
        $data['getRecord'] = Page::getRecord();
        return view('backend.page.list',$data);

    }

    public function add_page() 
    {
        return view('backend.page.add');
    }

    public function insert_page(Request $request)
    {
        $page = new Page;
        $page->slug = trim($request->slug);
        $page->title = ucwords(trim($request->title));
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

        return redirect('panel/page/list')->with('success', 'Page successfully created.');

    }

    public function edit_page($id)
    {
        $data['getRecord'] = Page::getSingle($id);
        return view('backend.page.edit', $data); 
    }

    
    public function update_page(Request $request, $id)
    {
        $page = Page::getSingle($id);
        $page->slug = trim($request->slug);
        $page->title = ucwords(trim($request->title));
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

        return redirect('panel/page/list')->with('success', 'Page successfully updated.');
    }


}
