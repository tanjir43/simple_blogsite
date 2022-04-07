<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;
    
    public static function deleteCategory($id){
    self::$category = Category::find($id);    
    self::$category->delete();
}
}
