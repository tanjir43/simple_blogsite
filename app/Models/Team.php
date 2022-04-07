<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    private static $team;

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }

  

    public static function TeamDelete($id){
        self::$team = Team::find($id);
        if (file_exists(self::$team->image)) {
            unlink(self::$team->image);
        }
        self::$team->delete();
    }
}
