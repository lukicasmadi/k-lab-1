<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function change_password_process(ChangePasswordRequest $request)
    {
        $credential = [
            'email' => auth()->user()->email,
            'password' => request('current_password')
        ];

        if(auth()->attempt($credential)) {

            User::whereId(myUserId())->firstOrFail()->update([
                'password' => bcrypt(request('new_password'))
            ]);

            flash('Your data has been updated')->success();
            return redirect()->back();
        } else {
            flash('Your old password not match in our system')->error();
            return redirect()->back();
        }
    }

    public function profile()
    {
        $profile = User::whereId(myUserId())->first();
        return view('user.profile_update', compact('profile'));
    }

    public function profile_process(UpdateProfileRequest $request)
    {
        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'profile' => request('profile'),
        ];

        if(request()->hasFile('avatar')) {
            $file = $request->file('avatar');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/profile/".$randomName, File::get($file));
            $data['avatar'] = $randomName;
        }

        User::whereId(myUserId())->first()->update($data);

        flash('Your profile has been updated')->success();
        return back();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
