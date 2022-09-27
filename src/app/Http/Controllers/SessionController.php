<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    /**
     * @group 01.User
     * Register
     * 
     * @bodyParam grant_type string required password. Example: password
     * @bodyParam client_id string required client_id. Example: 1
     * @bodyParam client_secret string required client's secret. Example: secret
     * @bodyParam mobile string required username. Example: 0812345678
     * @bodyParam scope string scope. Example: *
     * @response {
     *        "token": {
     *            "token_type": "Bearer",
     *            "expires_in": 31536000,
     *            "access_token": "eyJ0eXA...",
     *            "refresh_token": "def50200a..."
     *        },
     *        "success": true
     *        }
     */
    public function register(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), User::validation(null, 'reg'));
        if ($validator->fails()) {
            $result['validation error'] = $validator;
        } else {
            $user = $this->create($request->all());
            $user->save();

            try {
                $response = Http::post('http://localhost/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $request->get('client_id'),
                    'client_secret' => $request->get('client_secret'),
                    'username' => $request->get('mobile'),
                    'password' => 'the-password-keep-it-blank',
                    'scope' => '*',
                ]);
                $token = $response->json();
                if (array_key_exists("error", $token)) {
                    $result['token error'] = $token;
                } else {
                    $result['token'] = $token;
                    $result['success'] = true;
                }
            } catch (\Throwable $th) {
                dd('th', $th);
            }
        }
        return response($result);
    }
    /**
     * @group 01.User
     * Login
     * 
     * @bodyParam grant_type string required password. Example: password
     * @bodyParam client_id string required client_id. Example: 1
     * @bodyParam client_secret string required client's secret. Example: secret
     * @bodyParam mobile string required username. Example: 0812345678
     * @bodyParam scope string scope. Example: *
     * @response {
     *        "token": {
     *            "token_type": "Bearer",
     *            "expires_in": 31536000,
     *            "access_token": "eyJ0eXA...",
     *            "refresh_token": "def50200a..."
     *        },
     *        "success": true
     *        }  
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), User::validation(null, 'login'));
        if ($validator->fails()) {
            $result['validation error'] = $validator;
        } else {
            try {
                $response = Http::post('http://localhost/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $request->get('client_id'),
                    'client_secret' => $request->get('client_secret'),
                    'username' => $request->get('mobile'),
                    'password' => 'the-password-keep-it-blank',
                    'scope' => '*',
                ]);
                $token = $response->json();
                if (array_key_exists("error", $token)) {
                    $result['token error'] = $token;
                } else {
                    $result['token'] = $token;
                    $result['success'] = true;
                }
            } catch (\Throwable $th) {
                dd('th', $th);
            }
        }
        return response($result);
    }
    /**
     * @group 01.User
     * Logout
     * 
     * @authenticated
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        $accesstoken = $user->token();
        $accesstoken->revoke();
        $result['success'] = true;
        return response($result);
    }

    private function create(array $data)
    {
        $user = new User();
        $user->mobile = $data['mobile'];
        $user->mobile_verified_at = $data['mobile_verified_at'] ?? null;
        $user->save();
        return $user;
    }
}
