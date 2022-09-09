<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $result['user'] = array(
            'id' => $user->id,
            'mobile' => $user->mobile,
            'name' => $user->name
        );
        return response($result);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $validate = User::validation($user->id);
        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()){
            dd($request);
        } else {
            $user->fill($request->only([
                'mobile',
                'name'
            ]));
            $user->save();
        }
        return response($user);
    }

}
