<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingApplication;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company_name = SettingApplication::where('id',1)->get();
        $role = Auth::user();
        $name_user = $role->name;
        return view('admin.dashboard',compact(['company_name','name_user']));
    }
}
