<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Models\SettingApplication;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company_name = SettingApplication::where(1);
        $name_user = Auth::user()->name;
        $data = RolePermission::with('user','role')->get();
        // var_dump($data);
        return view('admin.role.index',compact('data','company_name','name_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company_name = SettingApplication::where(1);
        $name_user = Auth::user()->name;
        $user = User::all();
        $role = Role::all();
        return view('admin.role.create',compact('company_name','name_user','user','role'));
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
        $validate = Validator::make($request->all(),[
            'user_name' => 'required',
            'role_type'   => 'required',
        ]);

        if(!$validate->fails()){
            $data = [
                'user_id' => $request->post('user_name'),
                'role_id' => $request->post('role_type'),
                'user_type' => 'App\User',
            ];
            Alert::toast('User Berhasil Di tambahkan','success');
            $data = RolePermission::create($data);
            return redirect()->route('RoleManagementView');
        }else{
            Alert::toast('Ada Kesalahan','error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     return view('admin.role.detail');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        // return view('admin.role.update');
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
        $role = RolePermission::where('user_id',$id)->delete();

        if($role != null){
            Alert::toast('Role Berhasil Di Hapus','success');
            return redirect()->route('RoleManagementView');
        }else{
            Alert::toast('Ada Kesalahan, Silahkan Hubungi Pihak Pengembang','error');
            return redirect()->back();
        }
    }
}
