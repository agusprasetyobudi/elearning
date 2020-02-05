<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModels;
use App\Models\SettingApplication;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $id = $request->segment(4);
        $course = CourseModels::where('parent_id',$id)->get();
        $course_name = CourseModels::where('id',$id)->select('course_name')->get();
        foreach ($course_name as $key) {
            # code...
            $name_course = $key->course_name;
        }
        // dd($data);
        return view('admin.course.video.sub_category.sub_category', compact('company_name','name_course','name_user','course','name_course'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd($request->post());
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $course_title = CourseModels::where('parent_id',0)->get();

        return view('admin.course.video.sub_category.sub_category_create', compact(['company_name','name_user','course_title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->segment(5));
        $id = $request->segment(5);
        $data = $request->post();
        $validate = Validator::make($request->all(),['course_name.*' => 'required','youtube_link.*'=> 'required','description.*'=> 'required']);
        if (!$validate->fails()) {
            // dd($data);
            // $sub_course->parent_id = $id;
            // $sub_course->course_name = $request->input('course_name');
            // $sub_course->link_video = $request->input('youtube_link');
            // $sub_course->description = $request->input('description');
            // $res = $sub_course->save();
            for ($i = 0; $i < count($request->input('course_name')); $i++) {
                $yt_id = $this->YoutubeID($request->input("youtube_link.$i"));
                $datas[] = [
                    'parent_id'    =>$id,
                    'course_name'  =>$request->input("course_name.$i"),
                    'link_video'   =>$yt_id,
                    'description'  =>$request->input("description.$i"),
                    'status'       => 1
                ];

            }
            // dd($datas);
            $res = CourseModels::insert($datas);

            if (!$res) {
                Alert::toast('Terjadi Kesalahan, Silahkan Cek Kembali','error');
                return redirect()->back();
            }
            Alert::toast('Data Sub Modul Kursus Berhasil Di Tambahkan','success');
            return redirect()->route('SubCategoryCourse', ['id' => $id]);
        }else{
            Alert::toast('Data Sub Modul Kurang Lengkap, Silahkan Cek Kembali','error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        # code...
        // dd($id);
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        $data = CourseModels::find($id);
        // dd($data);

        return view('admin.course.video.sub_category.sub_category_update', compact(['data','company_name','name_user']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
                return redirect()->route('SubCategoryCourse', ['id' => $id]);
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
            Alert::toast('Data Gagal Di Update','error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            // example:
        // Alert::success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
            CourseModels::destroy($id);
            Alert::toast('Data Berhasil Di Hapus','success');
            return redirect()->back();
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
            Alert::toast('Data Gagal Di Update','error');
            return redirect()->back();
        }
    }

    ///////////// Addtional Function ///////////////
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
