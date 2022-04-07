<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    private static $tag;

    public static function deleteTag($id){
        self::$tag = Tag::findOrFail($id);
        self::$tag->delete();
    }
}
