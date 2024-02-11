<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    // static public function getRecord() {
    //     return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
    //         ->join('users', "users.id", '=', "blogs.user_id")
    //         ->join('categories', "categories.id", '=', "blogs.category_id")
    //         ->where('blogs.is_delete', '=', 0)
    //         ->orderBy('blogs.id', 'desc')
    //         ->paginate(20);
    // }
    static public function getSingle($id){
        return Blog::find($id);
    }
    static public function getRecord() {
        return DB::table('blogs')
            ->select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', "users.id", '=', "blogs.user_id")
            ->join('categories', "categories.id", '=', "blogs.category_id")
            ->where('blogs.is_delete', '=', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);
    }
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
