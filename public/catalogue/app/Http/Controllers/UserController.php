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
            $image = $request->get('image');
            $banner = $request->get('banner');

            if ($name != '') {
                $user->name = $name;
            }

            if ($email != '') {
                $user->email = $email;
            }

            if ($image != '') {
                $user->avatarUrl = $image;
            }

            if ($banner != '') {
                $user->bannerUrl = $banner;
            }
            $user->save();
            return redirect()->route('profile');
        }

        return response()->json(['user_updated' => true], 201);
    }
}
