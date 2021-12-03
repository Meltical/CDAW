<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUpdateUser()
    {
        return view('updateProfile');
    }

    public function putUpdateUser(Request $request)
    {
        $userid = Auth::user()->id;
        if ($userid) {
            $user = User::find($userid);

            $name = $request->get('name');
            $email = $request->get('email');

            if ($name != '') {
                $user->name = $name;
            }

            if ($email != '') {
                $user->email = $email;
            }

            $user->save();
        }

        return response()->json(['user_updated' => true], 201);
    }
}
