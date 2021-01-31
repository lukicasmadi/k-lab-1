<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polda;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Http\Requests\UHPRequest;

class UserHasPoldaController extends Controller
{
    public function data()
    {
        $model = Polda::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function polda_access_index()
    {
        return view('user_polda.index');
    }

    public function check_user_polda($id)
    {
        $user_list = [];

        $findPoldaById = UserHasPolda::with('polda')->where("polda_id", $id)->first();
        $getAllUser = User::select('id', 'name')->get();

        if(empty($findPoldaById)) {
            $getAllUser->map(function ($item) {
                $item['checked'] = "no";
            });
            $config = "0";
        } else {
            $id = $findPoldaById->user_id;
            $getAllUser->map(function ($item) use ($id) {
                if($id == $item->id) {
                    $item['checked'] = "yes";
                } else {
                    $item['checked'] = "no";
                }
            });
            $config = $id;
        }

        return response()->json([
            'users' => $getAllUser,
            'config' => $config,
        ], 200);
    }

    public function polda_access_store(UHPRequest $request)
    {
        $find = UserHasPolda::where("polda_id", $request->polda_id)->first();

        if(!empty($find)) {
            $find->update([
                'user_id' => $request->user_assign,
                'polda_id' => $request->polda_id,
            ]);
        } else {
            UserHasPolda::create([
                'user_id' => $request->user_assign,
                'polda_id' => $request->polda_id,
            ]);
        }

        flash('User has attached to polda')->success();
        return redirect()->back();
    }
}
