<?php

namespace App\Http\Controllers;

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
     *       "mobile": "0873000207",
     *       "mobile_verified_at": "2022-09-21T09:29:03.000000Z",
     *       "created_at": "2022-09-21T09:29:04.000000Z",
     *       "updated_at": "2022-09-21T09:29:04.000000Z",
     *       "deleted_at": null
     *   }
     * }
     */
    public function show()
    {
        $result = [];
        $user = Auth::user();
        $result['user'] = $user;
        return response($result);
    }

    /**
     * @group 01.User
     * Update user
     * 
     * @bodyParam mobile string
     * @authenticated
     * @response {
     *    "user": {
     *        "id": 1,
     *        "mobile": "0873040207",
     *        "mobile_verified_at": "2022-09-21T09:29:03.000000Z",
     *        "created_at": "2022-09-21T09:29:04.000000Z",
     *        "updated_at": "2022-09-23T05:23:46.000000Z",
     *        "deleted_at": null
     *    },
     *    "success": true
     *}
     */
    public function update(Request $request)
    {
        $result = [];
        $user = Auth::user();
        $result['user'] = $user;
        $validator = Validator::make($request->all(), User::validation($user->id));
        if($validator->fails()){
            $result['success'] = false;
        } else {
            $user->fill($request->only(['mobile']));
            $user->save();
            $result['user'] = $user;
            $result['success'] = true;
        }
        return response($result);
    }
}
