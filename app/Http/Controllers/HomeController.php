<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Category;
use App\Models\Page;
class HomeController extends Controller
{
    //
    function homeController(){

        // Decode HTML escape codes
        // $data['discripttion'] = !empty($getPage) ? strip_tags(htmlspecialchars_decode($getPage->discripttion)) : '';

        $getPage = Page::getSlug('home');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';

        return view("frontEnd/home", $data);
    }
    function aboutController(){
        $getPage = Page::getSlug('about');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';
        return view("frontEnd/about", $data);
    }
    function teamController(){
        $getPage = Page::getSlug('teams');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';
        return view("frontEnd/team", $data);
    }
    function galleryController(){
        $getPage = Page::getSlug('gallery');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';
        return view("frontEnd/gallery", $data);
    }
    function blogController(Request $request){
        $getPage = Page::getSlug('blog');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';
        $data['getRecord'] = Blog::getRecordFront($request);
        return view("frontEnd/blog", $data);
    }
    function contactController(){
        $getPage = Page::getSlug('contact');
        $data['meta_title'] = !empty($getPage)  ? $getPage->meta_title : '';
        $data['meta_keywords'] = !empty($getPage)  ? $getPage->meta_keywords : '';
        $data['meta_description'] = !empty($getPage)  ? $getPage->meta_description : '';
        return view("frontEnd/contact", $data);
    }
    function slugBlogController($slug){
        $getCategory = Category::getSlug($slug);
        $getRecord = Blog::getRecordSlug($slug);
        if(!empty($getCategory)){
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['header_title'] = $getCategory->title;
            $data['getRecord'] = Blog::getRecordFrontCategory($getCategory->id);
            return view("frontEnd/blog", $data);
        }else{
            if(!empty($getRecord)){
                $data['getRecordRecent'] = Blog::getRecordRecent();
                $data['getCategory'] = Category::getCategory();
                $data['getRelatedTag'] = Blog::getRelatedTag($getRecord->id);
                $data['getRelatedCategory'] = Blog::getRelatedCategory($getRecord->category_id, $getRecord->id);
                $data['meta_title'] = $getRecord->title;
                $data['meta_description'] = $getRecord->meta_description;
                $data['meta_keywords'] = $getRecord->meta_keywords;
                $data['getRecord'] = $getRecord;
                return view("frontEnd/blogDeatail", $data);
            }else{
                abort(404);
            }
        }
        

        
    }

}
