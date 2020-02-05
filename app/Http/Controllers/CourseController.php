<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModels;
use App\Models\SettingApplication;
use Validator;
use Alert;

class CourseController extends Controller
{
//////////////////// Video Sides /////////////////////////

public function index(CourseModels $course)
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
        $course_title = $course->where('parent_id',0)->get();
        return view('course.course',compact(['company_name','name_user','course_title']));
}

public function VideoIndex()
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
    $course = CourseModels::where(['parent_id'=> 0,'is_video'=>1])->get();
    // dd($course);
    return view('course.video.index', compact(['company_name','name_user','course']));
}

public function Videolist($id)
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
    $course_title = CourseModels::where('parent_id',0)->get();
    $course_name = CourseModels::find($id);
    $list_course = CourseModels::where('parent_id',$id)->get();
    // dd($list_course);
       if(!$list_course->isEmpty()){
        return view('course.video.join',compact(['company_name','name_user','course_title','list_course','course_name']));
       }else{
        // return view('course.join',compact(['company_name','name_user','course_title','list_course']));
        return redirect()->route('VideoCourseDetail', ['id' => $id]);
        return redirect()->back();
       }
}

public function VideodetailCourses($id)
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
    $list_course = CourseModels::where('parent_id',$id)->get();
    $course_title = CourseModels::where([['parent_id','=', 0],['status','=', 1]])->get();
    $detail = CourseModels::where([['id',$id],['status',1],['is_video',1]])->first();
    if(!empty($detail)){
    return view('course.video.detail', compact(['detail','company_name','name_user','course_title','list_course']));
    }else{
        Alert::error('Course Yang Dipilih Tidak Tersedia')->autoClose(3000);
        return redirect()->back();
    }
}

/////////////////// Materi Sides //////////////////////////

public function Materilist()
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
    $course_title = CourseModels::where(['parent_id'=>0,'is_video'=>2])->get();
    // $course_name = CourseModels::find($id);
    $list_course = CourseModels::where(['parent_id'=>0, 'is_video'=>2])->get();

    //    if(!$list_course->isEmpty()){
        return view('course.materi.join',compact(['company_name','name_user','course_title','list_course']));
    //    }else{
    //     // return view('course.join',compact(['company_name','name_user','course_title','list_course']));
    //     return redirect()->back();
    //    }
}

public function MateridetailCourses($id)
{
    $company_name = SettingApplication::where('id',1)->get();
    $role = Auth::user();
    $name_user = $role->name;
    $list_course = CourseModels::where('parent_id',$id)->get();
    $course_title = CourseModels::where([['parent_id','=', 0],['status','=', 1]])->get();
    $detail = CourseModels::where([['id',$id],['status',1]])->first();
    if(!empty($detail)){
    return view('course.materi.detail', compact(['detail','company_name','name_user','course_title','list_course']));
    }else{
        Alert::error('Course Yang Dipilih Tidak Tersedia')->autoClose(3000);
        return redirect()->back();
    }
}
}
