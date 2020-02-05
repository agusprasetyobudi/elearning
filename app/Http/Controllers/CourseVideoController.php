<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModels;
use App\Models\SettingApplication;
use Validator;
use Alert;

class CourseVideoController extends Controller
{
       //
       public function index(CourseModels $course)
       {
           $company_name = SettingApplication::where('id',1)->get();
           $role = Auth::user();
           $name_user = $role->name;
               $course = CourseModels::where('parent_id',0)->get();
               return view('admin.course.video.course_view',compact(['company_name','name_user','course']));

       }

       public function detail($id)
       {
           $company_name = SettingApplication::where('id',1)->get();
           $role = Auth::user();
           $name_user = $role->name;

               $course = CourseModels::where('parent_id',$id)->get();
               $course_name = CourseModels::where('id',$id)->select('course_name')->get();
               foreach ($course_name as $key) {
                   # code...
                   $name_course = $key->course_name;
               }
               return view('admin.course.video.course_detail',compact(['company_name','name_user','course','name_course']));

       }

       public function created(Request $request, CourseModels $course)
       {
           $company_name = SettingApplication::where('id',1)->get();
           $role = Auth::user();
           $name_user = $role->name;

           if($request->method() == "GET"){
               $course_title = $course->where('parent_id',0)->get();
               return view('admin.course.video.course_create', compact(['company_name','name_user','course_title']));
           }else if($request->method() == "POST"){

               $validate = Validator::make($request->all(),['course_name'=> 'required' , 'description'=> 'required' ]);
               if(!$validate->fails()){
                   $yt_id = $this->YoutubeID($request->input('youtube_link'));
                   $data = [
                       'parent_id'     =>0,
                       'course_name'   =>$request->input('course_name'),
                       'link_video'    =>$yt_id,
                       'is_video'      =>1,
                       'description'   =>$request->input('description'),
                       'status'        =>1,
                   ];
                   CourseModels::create($data);
                   Alert::toast('Kursus Telah DiTambahkan','success');
                   return redirect()->route('VideoCourseViewAdmin');
               }else{
                   Alert::toast('Ada Terjadi Kesalahan','error');
                   return redirect()->back();
                   // dd($validate->errors());
               }
           }
       }

       public function edit(Request $request, $id)
       {
           # code...
           // dd($id);
           $company_name = SettingApplication::where('id',1)->get();
           $role = Auth::user();
           $name_user = $role->name;
           $data = CourseModels::find($id);
           // dd($data);

           return view('admin.course.video.course_update', compact(['data','company_name','name_user']));
       }

       public function updated(Request $request)
       {
       //   dd($request->post());
         $selected = $request->input('course_selected');
         $id = $request->input('laravel_version');
         if($selected == 1){
           $data = [
               'course_name' => $request->input('course_name'),
               'link_video'  => $request->input('youtube_link'),
               'description' => $request->input('description'),
               'status'      => $request->input('status_course'),
           ];
         }else if($selected == 2){
           $data = [
               'course_name' => $request->input('course_name'),
               'link_video'  => null,
               'description' => $request->input('description'),
               'status'      => $request->input('status_course'),
           ];
           }
           try {
                   // dd($data);
                   CourseModels::where('id', $id)->update($data);
                   CourseModels::where('parent_id', $id)->update(['status'=> $request->input('status_course')]);
                   Alert::toast('Data Berhasil Di Update','success');
                   return redirect()->route('VideoCourseViewAdmin');
           } catch (\Illuminate\Database\QueryException $e) {
               //throw $th;
               Alert::toast('Data Gagal Di Update','error');
               return redirect()->back();
           }
       }

       public function deleted($id)
       {
           try {
               // example:
           // Alert::success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
               CourseModels::destroy($id);
               Alert::toast('Data Berhasil Di Hapus','success');
               return redirect()->route('VideoCourseViewAdmin');
           } catch (\Illuminate\Database\QueryException $e) {
               //throw $th;
               Alert::toast('Data Gagal Di Update','error');
               return redirect()->back();
           }
       }
         /////////////////////// Addtional Function //////////////////////////


       private function YoutubeID($url)
       {
             if(strlen($url) > 11)
             {
                 if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
                 {
                     return $match[1];
                 }
                 else
                     return false;
             }

             return $url;
       }

}
