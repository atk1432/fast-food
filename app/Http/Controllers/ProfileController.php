<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{

    public function profile(Request $request, $id, $name) {

        $user = User::findOrFail($id)->name;

        if (convertNameURI($user) != $name) {
            abort(404);
        }

        return view('profile.index', [
            'user' => $request->user(),            
        ]);

    }

}
