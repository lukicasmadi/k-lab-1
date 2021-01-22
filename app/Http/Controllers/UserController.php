<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassword;

class UserController extends Controller
{

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function change_password_process(ChangePassword $request)
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

    public function profile(Request $request)
    {
        //
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
