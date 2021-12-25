<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    
    public function register()
    {
        return view('backend.auth.register');
    }
    public function registerRequest(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
        ];

        try {
            User::create($data);
            $request->session()->put('LoggedUser', $data);
            $this->getSuccessMessage('User registration Success');
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            $this->getErrorMessage($e->getMessage());
            
            return redirect()->back();
        }

        
    }
    public function login()
    {
        return view('backend.auth.login');
    }
    public function loginRequest(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cred = $request->except(['_token']);
       
        if(auth()->attempt($cred))
        {
            $request->session()->put('LoggedUser', $cred);
            $this->getSuccessMessage('User Login Success!');
            return redirect()->route('dashboard');
        }
        $this->getErrorMessage('Invalid User Credentials!');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            $this->getSuccessMessage('Logout Success!');
            return redirect()->route('login');
        }
    }
}
