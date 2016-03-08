<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use Session;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $mainMenu;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mainMenu = new HomeController;
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         // 'username' => 'required|max:255|unique:users',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getLogin()
    {
        $mainMenu = $this->mainMenu->frontendMenu();
        return view('auth.login')->with('mainMenu', $mainMenu);
    }
    
    protected function getRegister()
    {
        $mainMenu = $this->mainMenu->frontendMenu();
        return view('auth.register')->with('mainMenu', $mainMenu);
    }

    /**
     * User Login.
     * 
     * @param  UserLogin $request [description]
     * @return [type]             [description]
     */
    protected function postLogin(UserLogin $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember))
        {
            if(Auth::check())
            {
                if(Auth::user()->access != '0')
                {
                    return redirect('/');
                }
                else
                {
                    return redirect('admin/dashboard');
                }
            }
        }
        else
        {
            if($request->get('type') == 'admin')
            {
                return redirect('admin/adminlogin')->with('error', 'Email And Password Does Not Match');
            }
            else
            {
                return redirect('auth/userlogin')->with('error', 'Email And Password Does Not Match');
            }
        }
    }

    protected function postRegister(UserRegister $request)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());

        Auth::login($user);

        return redirect('/');
    }

    protected function getLogout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }

}
