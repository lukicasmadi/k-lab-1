<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{

    public function forgot_password_index()
    {
        return view('auth.forgot');
    }

    public function forgot_password_process(Request $request)
    {
        flash('Your request has been sent')->success();
        return redirect()->back();
    }

    public function forgot_password_request()
    {
        return view('user.forgot_password_request');
    }

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

            flash('Password anda berhasil diganti')->success();
            return redirect()->back();
        } else {
            flash('Password lama anda tidak sesuai dengan data di sistem. Silakan cek kembali')->error();
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

        flash('Profil anda berhasil diubah')->success();
        return redirect()->back();
    }

    public function data()
    {
        $model = User::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('user.index');
    }

    public function user_detail($id)
    {
        $model = User::findOrFail($id);

        return response()->json([
            'output' => $model,
        ], 200);
    }

    public function store(CreateUserRequest $request)
    {
        if(empty($request->id_user)) {

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
            ]);

            flash('Data user berhasil ditambahkan')->success();
        } else {
            $data = User::findOrFail(request('id_user'));

            $newData = [
                'name' => request('name'),
                'email' => request('email'),
            ];

            if(!empty(request('password'))) {
                $newData['password'] = bcrypt(request('password'));
            }

            $data->update($newData);
            flash('Data user berhasil diubah')->success();
        }

        return back();
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->delete();

        return response()->json([
            'output' => 'Data user berhasil dihapus',
        ], 200);
    }
}
