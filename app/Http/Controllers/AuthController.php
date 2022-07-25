<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{

    /** 
     *                 |
     *                 |
     * Resource admin  |
     *                \/               
     */                 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index() {
        return view('admin.index', [
            'columns' => Schema::getColumnListing('users'),
            'items' => User::all(),
            'url_create' => route('auth.login'),
            'hidden' => ['password', 'remember_token']
        ]);
    }




    /**
     * Main page |
     *           |
     *          \/
     */

    /**
     *  Display login user page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function login() {
        return view('auth.login');
    } 

    /**
     * Sign in user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request) {

        // $validated = User::validate($request);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            return redirect('/');
        } else {
            return back()->withErrors([
                'invalid' => 'Email hoặc mật khẩu không hợp lệ.'
            ]);
        }

    }

    /**
     * Display register user page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function register() {
        return view('auth.register');
    }

    /**
     * Create user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $validated = User::validateRegister($request);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('auth.login');

    }



}
