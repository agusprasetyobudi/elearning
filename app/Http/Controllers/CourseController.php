<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModels;
use App\Models\SettingApplication;
use Validator;

class CourseController extends Controller
{
    //
    public function index(CourseModels $course)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;

        # code...
        if($role->hasRole('superadministrator|administrator')){
            $course = CourseModels::where('parent_id',0)->get();
            return view('admin.course.course_view',compact(['company_name','name_user','course']));
        }else if($role->hasRole('user')){
            $course_title = $course->where('parent_id',0)->get();
            return view('course.course',compact(['company_name','name_user','course_title']));
        }
    }

    public function list($id)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $course_title = CourseModels::where('parent_id',0)->get();
        $list_course = CourseModels::where('parent_id', $id)->get();
            return view('course.join',compact(['company_name','name_user','course_title','list_course']));
    }

    public function detail($id)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        // dd($id);
        if($role->hasRole('superadministrator|administrator')){
            $course = CourseModels::where('parent_id',$id)->get();
            $course_name = CourseModels::where('id',$id)->select('course_name')->get();
            foreach ($course_name as $key) {
                # code...
                $name_course = $key->course_name;
            }
            return view('admin.course.course_detail',compact(['company_name','name_user','course','name_course']));
        }else{
        $course_title = CourseModels::where('parent_id',0)->get();
            $detail = CourseModels::where('id',$id)->first();
            // dd($detail->course_name);
            return view('course.detail', compact(['detail','company_name','name_user','course_title','list_course']));
        }
    }

    public function created(Request $request, CourseModels $course)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;

        if($request->method() == "GET"){
            $course_title = $course->where('parent_id',0)->get();
            return view('admin.course.course_create', compact(['company_name','name_user','course_title']));
        }else if($request->method() == "POST"){
            // dd($request->());
            if($request->ajax()){
                // $validate = Validator::make($request->all(),[

                // ]);
                // if(!$validate->fails()){
                    dd($request->all());
                // }
            }
        }
    }

    public function updated(Request $request)
    {
        if($request->method() == "GET"){

        }else if($request->method() == "POST"){

        }
    }

    public function deleted(Request $request)
    {
        if($request->method() == "POST"){

        }
    }
}
