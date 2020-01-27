<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\RolePermission;
use App\Models\SettingApplication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->hasRole('superadministrator')){
            $user = User::paginate(10);
        }else{
            $user = User::where('status_user','!=',3)->paginate(10);
        }
        $name_user = Auth::user()->name;
        $company_name = SettingApplication::where('id',1)->get();
        return view('admin.user.index', compact('user','company_name','name_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name_user = Auth::user()->name;
        $company_name = SettingApplication::where('id',1)->get();
        return view('admin.user.create', compact('name_user','company_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id=null)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password'=> 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if(!$validated->fails()){
            $data = [
                'name' => $request->post('name'),
                'username' => $request->post('username'),
                'password' => Hash::make($request->post('password')),
                'email' => $request->post('email'),
                'status_user' => 1,
                'reason' => 'User Baru',
            ];
            $res = User::create($data);
            // dd($res);
            Alert::toast('User Telah Di Daftarkan','success');
            return redirect()->route('UserManagementView');
        }else{
            Alert::toast('Ada Kesalahan, Silahkan Cek Kembali','error');
            return redirect()->back();
        }
    }

    public function activated($id)
    {
            $res = null;
            $user = User::find($id);
            if($user != null){
                $user->status_user = 1;
                $res = $user->save();
            }
            // dd($res);
            if($res){
                Alert::toast('User Telah Aktif','success');
            }else if($res == null){
                Alert::toast('Terjadi Kesalahan','error');
            }

            return redirect()->route('UserManagementView');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset_password(Request $request, $id=null)
    {
        if($request->method() == "GET"){
            $id = $request->segment(5);
            $name_user = Auth::user()->name;
            $company_name = SettingApplication::where('id',1)->get();
            return view('admin.user.password', compact('name_user','company_name','id'));
        }else if($request->method() == "POST"){
            $validated = Validator::make($request->all(),[
                'password'=> 'required|confirmed',
                'password_confirmation' => 'required',
                'counts' => 'required'
            ]);
            // dd($validated->fails());
            // return view('admin.user')
            $id = $request->post('counts');
            if(!$validated->fails()) {
                $user = User::find($id);
                $user->password = Hash::make($request->post('password'));
                Alert::toast('Password Berhasil Terupdate', 'success');
            return redirect()->route('UserManagementView');
            }else{
                Alert::toast('Password Tidak sama','error');
                return redirect()->back();
            }

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $name_user = Auth::user()->name;
        $company_name = SettingApplication::where('id',1)->get();
        $url = 'UserManagementDelete';
        // dd($user);
        return view('admin.user.update',compact('user','company_name','name_user','url'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->post());
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'status_user'=> 'required',
            'reason' => 'required'
        ]);
        if(!$validated->fails()){
            $data = [
                'name' => $request->post('name'),
                'username' => $request->post('username'),
                'password' => Hash::make($request->post('password')),
                'email' => $request->post('email'),
                'status_user' => $request->post('status_user'),
                'reason' => $request->post('reason'),
            ];
            User::where('id',$id)->update($data);
            Alert::toast('user Berhasil Di Perbaharui','success');
            return redirect()->route('UserManagementView');
        }else{
            Alert::toast('Ada Kesalahan, Silahkan Di Cek Kembali','error');
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
        //
        $res = null;
        $res_role = null;
        $user = User::find($id);
        $role = RolePermission::where('user_id',$id);
        if($user != null && $role != null ){
            $res = $user->delete();
        }else if($user != null){
            $res = $user->delete();
            $res_role = null;
        }
        // dd($role);
        // dd($res);
        if($res && $res_role != null || $res_role == null){
            Alert::toast('User Berhasil Terhapus Dari Sistem','success');
        }else if($res == null && $res_role == null){
            Alert::toast('Terjadi Kesalahan','error');
        }

        return redirect()->route('UserManagementView');

    }
}

