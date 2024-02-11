<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogtags extends Model
{
    use HasFactory;
    protected $table = 'blogtags';
    static public function InsertDeleteTag($blog_id, $tags){
        Blogtags::where('blog_id', '=', $blog_id)->delete();
        if(!empty($tags)){
            $tagsarray = explode(',', $tags);
            foreach($tagsarray as $tag){
                $save =new Blogtags;
                $save->blog_id = $blog_id;
                $save->name = $tag;
                $save->save();
            }
        }
    }
    
}
