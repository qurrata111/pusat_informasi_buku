<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{    
    /**
     * index
     *
     * @return \Illuminate\View\View
     */
    function index(){
        return view('login/form');
    }
    
    /**
     * checklogin
     *
     * @param  mixed $request
     * @return Illuminate\Support\Facades\Redirect
     */
    function checklogin(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)) {
            return redirect('main/login/success');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    /**
     * successlogin
     *
     * @return \Illuminate\View\View
     */
    function successlogin() {
        return view('login/success');
    }
    
    /**
     * logout
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    function logout() {
        Auth::logout();
        return redirect('main');
    }
}

?>