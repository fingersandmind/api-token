<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\LoginRequest;
use App\Http\Requests\api\UserRequest;
use App\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('register','login');
    }

    public function dateFormat($date)
    {
        return date( "Y-m-d H:i:s", strtotime($date) );
    }

    public function register(UserRequest $request)
    {
        $request->validated();
        $request->request->add(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        //**** Optional ****
        //auth()->attempt($user);

        $accessToken = $user->createToken('authToken');

        
        return $this->respondWithToken($accessToken);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        $credentials = request(['email', 'password']);
        
        if(!auth()->attempt($credentials))
        {
            return response()->json(['error' => 'This doesn\'t match any of our records!'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken');

        return $this->respondWithToken($accessToken);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function respondWithToken($accessToken)
    {
        $response = [
            'access_token' => $accessToken->accessToken,
            'token_type' => 'bearer',
            'expires_at' => $this->dateFormat($accessToken->token->expires_at)
        ];

        return response()->json($response);

    }
}
