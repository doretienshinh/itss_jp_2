<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request, User $user) {
        if (request()->get('password')) {
            $this->validate(request(), [
                'name' => 'required',
                'password' => 'min:6|confirmed'
            ]);
            $user->name = request('name');
            $user->password = Hash::make(\request('password'));
        } else {
            $this->validate(request(), [
                'name' => 'required',
            ]);
            $user->name = request('name');

        }
        if (request()->file('avatar')) {
            $filename = time().rand(1,10).'.'.request()->avatar->getClientOriginalExtension();
            $res = request()->avatar->storeAs('avatar', $filename, 'public');
            $user->avatar = $filename;
        }

        $user->save();

        return back();
    }
}
