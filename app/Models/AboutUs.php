<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    private static $about;
    
    public static function deleteAbout($id){
        self::$about = AboutUs::find($id);
        if (file_exists(self::$about->image_1)) {
            unlink(self::$about->image_1);
        }
        else if (file_exists(self::$about->image_2)) {
            unlink(self::$about->image_2);
        }
        else if (file_exists(self::$about->image_3)) {
            unlink(self::$about->image_3);
        }
        else if (file_exists(self::$about->image_4)) {
            unlink(self::$about->image_4);
        }
        self::$about->delete();
    }
}
