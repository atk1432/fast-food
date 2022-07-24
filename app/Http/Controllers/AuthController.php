<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     *  Display login user page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function login() {
        return view('auth.login');
    } 

    /**
     * Display register user page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function register() {
        return view('auth.register');
    }

}
