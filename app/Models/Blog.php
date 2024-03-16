<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    // static public function getRecord() {
        // return self::select('blogs .*', 'users.name as user_name', 'categories.name as category_name')
        //     ->join('users', "users.id", '=', "blogs.user_id")
        //     ->join('categories', "categories.id", '=', "blogs.category_id")
        //     ->where('blogs.is_delete', '=', 0)
        //     ->orderBy('blogs.id', 'desc')
        //     ->paginate(20);

    // }
    static public function getRecord(Request $request) {
        $return = DB::table('blogs')
            ->select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', "users.id", '=', "blogs.user_id")
            ->join('categories', "categories.id", '=', "blogs.category_id");
    
        if(!empty($request->input('id'))) {
            $return = $return->where('blogs.id', 'like', '%'.$request->input('id')."%");
        }
        if(!empty($request->input('username'))) {
            $return = $return->where('users.name', 'like', '%'.$request->input('username')."%");
        }
        if(!empty($request->input('category'))) {
            $return = $return->where('categories.name', 'like', '%'.$request->input('category')."%");
        }
        if(!empty($request->input('title'))) {
            $return = $return->where('blogs.title', 'like', '%'.$request->input('title')."%");
        }
        if(!empty($request->input('status'))) {
            $status = $request->input('status');
            if($status == 100){
                $status=0;
            }
            $return = $return->where('blogs.status', '=', $status);
        }
        if(!empty($request->input('is_publish'))) {
            $is_publish = $request->input('is_publish');
            if($is_publish == 100){
                $is_publish=0;
            }
            $return = $return->where('blogs.is_publish', '=', $is_publish);
        }
        if(!empty($request->input('start_date'))) {
            $return = $return->whereDate('blogs.created_at', '>=', $request->input('start_date'));
        }
        if(!empty($request->input('end_date'))) {
            $return = $return->whereDate('blogs.created_at', '<=', $request->input('end_date'));
        }
        $return = $return->where('blogs.is_delete', '=', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);
    
        return $return;
    }
    static public function getSingle($id){
        return Blog::find($id);
    }
    // static public function getRecord() {
    //     return DB::table('blogs')
    //         ->select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
    //         ->join('users', "users.id", '=', "blogs.user_id")
    //         ->join('categories', "categories.id", '=', "blogs.category_id")
    //         ->where('blogs.is_delete', '=', 0)
    //         ->orderBy('blogs.id', 'desc')
    //         ->paginate(20);
    // }
    // static public function getRecord() {
    //     return DB::table('blogs')
    //         ->select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
    //         ->join('users', "users.id", '=', "blogs.user_id")
    //         ->join('categories', "categories.id", '=', "blogs.category_id")
    //         ->where('blogs.is_delete', '=', 0)
    //         ->orderBy('blogs.id', 'desc')
    //         ->paginate(20);
    // }
    public function getImage(){
        if(!empty($this->img_file) && file_exists('upload/blog/'.$this->img_file)){
            return url('upload/blog/'.$this->img_file);
        }else{
            return '';
        }
    }
    public function getTag() {
        return $this->hasMany(Blogtags::class, 'blog_id');
    }
    
}
