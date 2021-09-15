<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;

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

   
    use AuthenticatesUsers {
        logout as performLogout;
    }
    
    protected $username;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin/clients';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }
    public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        if ( ! User::where('user_name', $request->login)->first() ) {
            return redirect()->back()
                ->withInput( $request->all())
                ->withErrors([
                    $this->username() => Lang::get('auth.user_name'),
                 
                ]);
        }

        if ( ! User::where('user_name', $request->user_name )->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput(
                    $request->all()
                    
                    )
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }
    }
    public function username()
    {
        return $this->username;
    }
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
