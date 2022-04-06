<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    private static $banner;
    
    public static function deleteBanner($id){
        self::$banner = Banner::find($id);
        if (file_exists(self::$banner->image)) {
            unlink(self::$banner->image);
        }
        self::$banner->delete();
    }
}
