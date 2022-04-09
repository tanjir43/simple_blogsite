<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    private static $package;

    public static function deletePackage($id){
        self::$package = Package::find($id);
        if(file_exists(self::$package->image)){
            unlink(self::$package->image);
        }
        self::$package->delete();
    }


}
