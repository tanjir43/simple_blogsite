<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static $blog;
    
    public static function deleteBlog($id){
        self::$blog = Blog::find($id);
        if (file_exists(self::$blog->image)) {
            unlink(self::$blog->image);
        }
        self::$blog->delete();
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }


}
