<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Category;
class HomeController extends Controller
{
    //
    function homeController(){
        return view("frontEnd/home");
    }
    function aboutController(){
        return view("frontEnd/about");
    }
    function teamController(){
        return view("frontEnd/team");
    }
    function galleryController(){
        return view("frontEnd/gallery");
    }
    function blogController(Request $request){
        $data['getRecord'] = Blog::getRecordFront($request);

        return view("frontEnd/blog", $data);
    }
    function slugBlogController($slug){
        $getCategory = Category::getSlug($slug);
        $getRecord = Blog::getRecordSlug($slug);
        if(!empty($getCategory)){
            $data['getRecord'] = Blog::getRecordFrontCategory($getCategory->id);
            return view("frontEnd/blog", $data);
        }else{
            if(!empty($getRecord)){
                $data['getRecordRecent'] = Blog::getRecordRecent();
                $data['getCategory'] = Category::getCategory();
                $data['getRelatedTag'] = Blog::getRelatedTag($getRecord->id);
                $data['getRelatedCategory'] = Blog::getRelatedCategory($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;
                return view("frontEnd/blogDeatail", $data);
            }else{
                abort(404);
            }
        }
        

        
    }
    function contactController(){
        
        return view("frontEnd/contact");
    }
}
