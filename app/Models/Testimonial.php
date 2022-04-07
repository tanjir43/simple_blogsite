<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    private static $testimonial;
    
    public static function deleteTestimonial($id){
        self::$testimonial = Testimonial::find($id);
        if (file_exists(self::$testimonial->image)) {
            unlink(self::$testimonial->image);
        }
        self::$testimonial->delete();
    }
}
