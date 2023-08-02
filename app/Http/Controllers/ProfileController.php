<?php

namespace App\Http\Controllers;

use App\Http\Requests\profile\PasswordUpdateRequest;
use App\Http\Requests\profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(){

       return view('pages.profile.edit',
        [
            'user' => auth()->user(),
            'users' => User::count(),
        ]
    );

    }
    public function update(ProfileUpdateRequest $request){

        $UpdateaData = $request->validated();

        User::find(auth()->id())->update($UpdateaData);

        return redirect()->back()->with([
            'success' => 'User Information Updated'
        ]);

    }

    public function updatepassword(PasswordUpdateRequest $request){

        $UpdateaData = $request->validated();

        User::find(auth()->id())->update(
            ['password' => Hash::make($UpdateaData['password'])]
        );

        return redirect()->back()->with([
            'success' => 'User Password Updated'
        ]);
    }


}
