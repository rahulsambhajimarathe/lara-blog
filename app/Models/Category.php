<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
class Category extends Model
{
    use HasFactory;
    static function getRecordUser(){
        return self::select('categories.*')
                    ->where('is_delete', '=', 0)
                    ->orderBy('categories.id', 'desc')
                    ->paginate(20);

    }
    static function getCategory(){
        return self::select('categories.*')
                    ->where('is_delete', '=', 0)
                    ->where('status', '=', 1)
                    ->get();

    }
    static public function getSingle($id){
        return Category::find($id);
    }
    public function totalBlog(){
        return $this->hasMany(Blog::class, 'category_id')
        ->where('blogs.status', '=', 1)
        ->where('blogs.is_publish', '=', 1)
        ->where('blogs.is_delete', '=' , 0)
        ->count();
    }
}
