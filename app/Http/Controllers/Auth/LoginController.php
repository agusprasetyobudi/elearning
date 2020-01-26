<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $maxAttemps = 3;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function showLoginForm(Request $request)
    {
        $company_name = env('APP_NAME');
        if($request->segment(1) == 'admin'){
            $admin =true;
            $admin_message = 'Welcome Admin Page';
            $url = route('LoginAdmin');
        }else if($request->segment(1) == 'course'){
            $admin = false;
            $admin_message = 'Sign in to start your course';
            $url = route('LoginCourse');
        }else if($request->segment(1) == 'login'){
            $admin = false;
            $admin_message = 'Sign in to start your course';
            $url = route('LoginCourse');
        }
        return view('auth.login', compact('company_name','admin_message','admin','url'));
    }

    protected function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

         if($this->authenticated($request, $this->guard()->user())){
            return null;
         }else{
             $id = Auth::user()->id;
            $user = User::where('id', intval($id))->first();
            if($user->status_user == 0){
                Auth::logout();
                return redirect()->route('LoginCourse')->with(['fail' => 'ID Belum aktif']);
            }else if($user->status_user == 2){
                Auth::logout();
                return redirect()->route('LoginCourse')->with(['failSuspend'=>' ID Tersuspended']);
            }elseif(User::where('status_user',1)->first()){
                if($request->segment(1)=='admin'){
                    if(Auth::user()->hasRole('superadministrator|administrator')){
                        return redirect()->route('DashboardAdmin');
                    }else{
                        return redirect()->route('DashboardCourse');
                    }
                }else{
                    if(Auth::user()->hasRole('superadministrator|administrator')){
                        return redirect()->route('DashboardAdmin');
                    }else{
                        return redirect()->route('DashboardCourse');
                    }
                }
            }
         }
    }

    protected function username()
    {
      return 'username';
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    // protected function clearUser(Request $request){
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();
    // }
    // protected function guard()
    // {
    //     return Auth::guard();
    // }
}
