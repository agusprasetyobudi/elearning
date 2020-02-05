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
    /////////////// For Courses User Only

    public function courseUser(CourseModels $course)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
            $course_title = $course->where('parent_id',0)->get();
            return view('course.course',compact(['company_name','name_user','course_title']));
    }

    public function list($id)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $course_title = CourseModels::where('parent_id',0)->get();
        $course_name = CourseModels::find($id);
        $list_course = CourseModels::where('parent_id',$id)->get();
           if(!$list_course->isEmpty()){
            return view('course.join',compact(['company_name','name_user','course_title','list_course','course_name']));
           }else{
            // return view('course.join',compact(['company_name','name_user','course_title','list_course']));
            return redirect()->route('CourseDetail', ['id' => $id]);
           }
    }

    public function detailCourses($id)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $list_course = CourseModels::where('parent_id',$id)->get();
        $course_title = CourseModels::where([['parent_id','=', 0],['status','=', 1]])->get();
        $detail = CourseModels::where([['id',$id],['status',1]])->first();
        if(!empty($detail)){
        return view('course.detail', compact(['detail','company_name','name_user','course_title','list_course']));
        }else{
            Alert::error('Course Yang Dipilih Tidak Tersedia')->autoClose(3000);
            return redirect()->back();
        }
    }
}
