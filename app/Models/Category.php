<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
