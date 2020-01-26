<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModels extends Model
{
    //
    protected $table = 'courses';
    protected $fillabel = ['id','parent_id','course_name','link_video','description','status'];
    protected $guarded = [];

}
