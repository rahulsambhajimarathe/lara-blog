<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogtags;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    //
    public function blog(Request $request){

        $data['getRecord'] = Blog::getRecord($request);
        return view('dackend/blog/list', $data);
    }
    public function add_blog(){

        $data['getCategory'] = Category::getCategory();
        return view('dackend/blog/add', $data);
    }
    public function add_blog_create(Request $request){
        $save = new Blog;
        $save->user_id = Auth::user()->id;
        $save->title = trim($request->title);
        $save->slug = Str::slug($request->title);
        $save->category_id = trim($request->category_id);
        $save->discripttion = trim($request->content_data);
        $save->meta_description  = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keyword);
        $save->is_publish = trim($request->is_publish);
        $save->status = trim($request->status);
        $save->save();

        $slug = Str::slug($request->title);
        $checkslug = Blog::where('slug', '=', $slug)->first();

        if(!empty($checkslug)){
            $dbslug =  $checkslug->slug.'-'.$checkslug->id;
        }else{
            $dbslug = $slug;
        }

        $save->slug = $dbslug;
        if(!empty($request->file('img_file'))){
            $ext = $request->file('img_file')->getClientOriginalExtension();
            $file = $request->file('img_file');
            $filename = $dbslug.'.'.$ext;
            $file->move('upload\blog', $filename);
            $save->img_file = $filename; 
        }
        $save->save();
        Blogtags::InsertDeleteTag($save->id, $request->tags);
        return redirect('panel/blog/list/')->with("success", "blog creat success full");
    }
    public function delete_post($id){               
        $save = Blog::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Category successfully deleted");
    }
    public function post_edit($id){
        $data['getCategory'] = Category::getCategory();
        $data['getRecord'] = Blog::getSingle($id);

        // return Blog::getImage();
        return view('dackend\blog\edit', $data);
    }

    public function update_post($id, Request $request){
        $save = Blog::getSingle($id);
        $save->title = trim($request->title);
        $save->category_id = trim($request->categoryid);
        $save->discripttion = trim($request->content_data);
        $save->meta_description  = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keyword);
        $save->is_publish = trim($request->is_publish);
        $save->status = trim($request->status);
        // $save->save();


        if(!empty($request->file('img_file'))){
            if(!empty($save->img_file)){
                unlink('upload/blog/'.$save->img_file);
            }
            $ext = $request->file('img_file')->getClientOriginalExtension();
            $file = $request->file('img_file');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/blog', $filename);
            $save->img_file = $filename; 
        }
        $save->save();
        Blogtags::InsertDeleteTag($save->id, $request->tags);
        return redirect('panel/blog/list/')->with("success", "blog success full updated");
    }
}
