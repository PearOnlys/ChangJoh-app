<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @group 01.User
     * Show user
     * 
     * @authenticated
     * @response {
     *   "user": {
     *       "id": 1,
     *       "mobile": "0873000207"
     *   }
     * }
     */
    public function show()
    {
        $result = [];
        $user = Auth::user();
        $result['user'] = new UserResource($user);
        return response($result);
    }

    /**
     * @group 01.User
     * Edit user (mobile)
     * 
     * @bodyParam mobile string
     * @authenticated
     * @response {
     *    "user": {
     *        "id": 1,
     *        "mobile": "0873040208"
     *    },
     *    "success": true
     *}
     */
    public function edit(Request $request)
    {
        $result = [];
        $user = Auth::user();
        $validator = Validator::make($request->only(['mobile']), User::validation($user->id), User::$msg);
        if($validator->fails()){
            $result['error'] = $validator->messages();
            $result['success'] = false;
        } else {
            $user->fill($request->only(['mobile']));
            $user->save();
            $result['user'] = new UserResource($user);
            $result['success'] = true;
        }
        return response($result);
    }
}
