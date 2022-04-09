<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    private static $project;
    
    public static function deleteProject($id){
        self::$project = Project::find($id);
        if (file_exists(self::$project->image)) {
            unlink(self::$project->image);
        }
        self::$project->delete();
    }
}
