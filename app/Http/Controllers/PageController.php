<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    //
    public function page(Request $request){

        $data['getRecord'] = Page::getRecord($request);
        return view('dackend/page/list', $data);
    }
    public function add_page(){
        return view('dackend/page/add');
    }
    public function add_page_create(Request $request){
        $save = new Page;
        $save->title = trim($request->title);
        $save->slug = trim($request->slug);
        $save->discripttion = trim($request->content_data);
        $save->meta_description  = trim($request->meta_description);
        $save->meta_title  = trim($request->meta_title);
        $save->meta_keywords = trim($request->meta_keyword);
        $save->save();

        
        return redirect('panel/page/list/')->with("success", "Page creat success full");
    }

    public function page_edit($id){
        $data['getRecord'] = Page::getSingle($id);

        // return Blog::getImage();
        return view('dackend\page\edit', $data);
    }

    public function update_page($id, Request $request){
        $save = Page::getSingle($id);
        $save->title = trim($request->title);
        $save->slug = trim($request->slug);
        $save->discripttion = trim($request->content_data);
        $save->meta_description  = trim($request->meta_description);
        $save->meta_title  = trim($request->meta_title);
        $save->meta_keywords = trim($request->meta_keyword);
        $save->save();

        return redirect('panel/page/list/')->with("success", "page success full updated");
    }

    // public function delete_page($id){               
    //     $save = Blog::getSingle($id);
    //     $save->is_delete = 1;
    //     $save->save();
    //     return redirect()->back()->with('success', "Category successfully deleted");
    // }
}
