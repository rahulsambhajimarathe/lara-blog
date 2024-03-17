<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    //
    
    function category() {
        $data['record'] = Category::getRecordUser();
        return view('dackend\category\list', $data);
    }
    function add_category(){
        return view('dackend\category\add');
    }
    function add_category_create(request $request){
        $save = new Category;
        $slug = trim(Str::slug($request->name));
        $save->name = trim($request->name);
        $save->slug = $slug;
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_keywords = trim($request->meta_keyword);
        $save->meta_description = trim($request->meta_description);
        $save->status = trim($request->status);
        $save->is_menu = trim($request->menu);
        $save ->save();
        return redirect('panel/category/list/')->with('success', "Category Successfull created");
    }
    function category_edit($id){
        $record['data'] = Category::getSingle($id);
        return view('dackend\category\edit', $record);
    }
    public function update_category($id, Request $request){
        $save = Category::getSingle($id);
        $save->name = trim($request->name);
        $save->slug = trim (Str::slug ($request->name));
        $save->title = trim($request->title);
        $save->meta_title =  trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim( $request->meta_keywords);
        $save->status = trim($request->status);
        $save->is_menu = trim($request->menu);
        $save->save();
        return redirect('panel/category/list')->with('success', "Category successfully updated");
    }
    public function delete_category($id){
                
        $save = Category::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Category successfully deleted");
    }
}
