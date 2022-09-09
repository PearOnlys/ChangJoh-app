<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rulesNew);
        if($validator->fails()){
            dd($request);
        } else {
            $user = $this->create($request->all());
            $user->save();
        }
        $result =[];
        try {
            $response = Http::post('http://localhost/oauth/token', [
                'grant_type' => 'password',
                'client_id' => $request->get('client_id'),
                'client_secret' => $request->get('client_secret'),
                'username' => $request->get('mobile'),
                'password' => $request->get('password'),
                'scope' => '*',
            ]);
            $token = $response->json();
            if (array_key_exists("error", $token)){
                dd($token);
            } else {
            $result['token'] = $token;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
        dd($result);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rulesLogin);
        if($validator->fails()){
            dd($request);
        } else {
            //
        }
        try {
            $response = Http::post('http://localhost/oauth/token', [
                'grant_type' => 'password',
                'client_id' => $request->get('client_id'),
                'client_secret' => $request->get('client_secret'),
                'username' => $request->get('mobile'),
                'password' => $request->get('password'),
                'scope' => '*',
            ]);
            $token = $response->json();
            if (array_key_exists("error", $token)){
                dd($token);
            } else {
            $result['token'] = $token;
            $result['success'] = true;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
        dd($result);   
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $accesstoken = $user->token();
        $accesstoken->revoke();
        $result['success'] = true;
        return response($result);
    }

    /*
    * Forget password?
    */
    public function forget(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), User::$rulesMobile);
        if ($validator->fails()) {
        } else {
            $user = User::where('mobile', $request->only('mobile'))->first();
            /* Send sms to that number with OTP */
            $result['sucess'] = true;
        }
        return response($result);
    }

    private function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'] ?? null;
        $user->mobile = $data['mobile'];
        $user->password = bcrypt($data['password']);
        $user->mobile_verified_at = $data['mobile_verified_at'] ?? null;
        $user->save();
        return $user;
    }
}
