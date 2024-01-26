<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:192'],
            'email' => ['required', 'string', 'min:3', 'max:191'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . auth()->id()]
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect(route('profile', auth()->user()->username))->with('message', 'Your profile has been updated');
    }
}
