<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModels;
use App\Models\SettingApplication;
use Validator;
use Alert;

class CourseMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseModels $course)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
            $course = CourseModels::where(['parent_id'=>0,'is_video'=>2])->get();
            return view('admin.course.materi.course_view',compact(['company_name','name_user','course']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, CourseModels $course)
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
            $course_title = $course->where('parent_id',0)->get();
            return view('admin.course.materi.course_create', compact(['company_name','name_user','course_title']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),['course_name'=> 'required' , 'youtube_link'=> 'required' , 'description'=> 'required' ]);
            if(!$validate->fails()){
                // $yt_id = $this->YoutubeID();
                $data = [
                    'parent_id'     =>0,
                    'course_name'   =>$request->input('course_name'),
                    'link_video'    =>$request->input('youtube_link'),
                    'description'   =>$request->input('description'),
                    'status'        =>1,
                    'is_video'     =>2
                ];
                CourseModels::create($data);
                Alert::toast('Kursus Telah DiTambahkan','success');
                return redirect()->route('MateriCourseViewAdmin');
            }else{
                Alert::toast('Ada Terjadi Kesalahan','error');
                return redirect()->back();
                // dd($validate->errors());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $company_name = SettingApplication::where('id',1)->get();
        // $role = Auth::user();
        // $name_user = $role->name;
        // $course = CourseModels::where('parent_id',$id)->get();
        // $course_name = CourseModels::where('id',$id)->select('course_name')->get();
        // foreach ($course_name as $key) {
        //     # code...
        //     $name_course = $key->course_name;
        // }
        // return view('admin.course.materi.course_detail',compact(['company_name','name_user','course','name_course']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
       {
           # code...
           $company_name = SettingApplication::where('id',1)->get();
           $role = Auth::user();
           $name_user = $role->name;
           $data = CourseModels::find($id);

           return view('admin.course.materi.course_update', compact(['data','company_name','name_user']));
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request)
       {
       //   dd($request->post());
         $selected = $request->input('course_selected');
         $id = $request->input('laravel_version');
           $data = [
               'course_name' => $request->input('course_name'),
               'link_video'  => $request->input('youtube_link'),
               'description' => $request->input('description'),
               'status'      => $request->input('status_course'),
           ];
           try {
                   // dd($data);
                   CourseModels::where('id', $id)->update($data);
                   CourseModels::where('parent_id', $id)->update(['status'=> $request->input('status_course')]);
                   Alert::toast('Data Berhasil Di Update','success');
                   return redirect()->route('MateriCourseViewAdmin');
           } catch (\Illuminate\Database\QueryException $e) {
               //throw $th;
               Alert::toast('Data Gagal Di Update','error');
               return redirect()->back();
           }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // example:
        // Alert::success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
            CourseModels::destroy($id);
            Alert::toast('Data Berhasil Di Hapus','success');
            return redirect()->route('MateriCourseViewAdmin');
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
            Alert::toast('Data Gagal Di Update','error');
            return redirect()->back();
        }
    }
}

