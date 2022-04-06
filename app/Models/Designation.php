<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

     private static $designation;
    
        public static function deleteDesignation($id){
        self::$designation = Designation::find($id);    
        self::$designation->delete();
    }
}
