<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller {

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verifyUserOtp', 'username', 'verifyUserOtpViaLink', 'resendOtp']]);
    }

    /**
     * Send verficiation code (OTP)
     *
     * @return array
     */
    /*public function requestForOtp($client_req_id, $type, $phone, $email)
    {
    //write_log('from method'.$client_req_id);
    return OtpValidator::requestOtp(
    new OtpRequestObject($client_req_id, $type, $phone, $email)
    );
    }*/

    /**
     * @return mixed
     */
    public function username() {
        $login = request()->input('email');

        if (is_numeric($login)) {
            $field = 'phone';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }

        request()->merge([$field => $login]);

        return $field;
    }

    /**
     * Get a JWT token via given credentials.
     *
     *
     * @param  \Illuminate\Http\Request        $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $response            = [];
        $response['success'] = false;
        $response_code       = 401;

        $login_id = $request->email;
        if (filter_var($login_id, FILTER_VALIDATE_EMAIL)) {

            if (User::where('email', $login_id)->exists()) {

                $user = User::where('email', $login_id)->first();

                $credentials = [
                    'email' => $request->email, 
                    'password' => $request->password
                ];

                
                if ($token = auth('api')->attempt($credentials)) {
                    
                    $user = JWTAuth::setToken($token)->toUser();

                    $date = Carbon::now()->addSeconds(auth('api')->factory()->getTTL() * 60)->toDateTimeString();

                    $date_miliseconds = (strtotime($date) * 1000);

                    return response()->json([
                        'access_token' => $token,
                        'token_type'   => 'bearer',
                        'expires_in'   => $date_miliseconds,
                        'user'         => $user,
                    ]);

                }
            }
        }
        /* else {
        $response['info']    = __('info.invalid.credentials');
        $response_code       = 500;
        $response['success'] = false;
        }*/

        //Return json response
        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
    }

    /**
     * Register a new user.
     *
     *
     * @param  \Illuminate\Http\Request        $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;
        $response['info']    = __('info.user.register_success');

        $data = $request->all();

        $rule = array(
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:users,email|email:rfc,dns',
            'password'   => 'required|string|min:8',
        );

        $message = array(
            'first_name.required' => 'First Name Is Required',
            'last_name.required'  => 'Last Name Is Required',
        );

        $validator = Validator::make($data, $rule, $message);

        /* if validation fails */
        if ($validator->fails()) {
            $response['success'] = false;
            $response['info']    = __('info.user.register_failed');
            $response['errors']  = $validator->errors();
            $response_code       = 422;
            return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
        }

        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
            ]);

            $response['success'] = true;
            $response['info']    = __('info.user.register_success');
            $response['data']    = $user;
        } catch (\Throwable $th) {
            $response['success'] = false;
            $response['info']    = __('info.user.register_failed');
            $response['errors']  = $th->getMessage();
            $response_code       = 422;
            return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
        }
        //Return json response
        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me() {
        return response()->json($this->guard('api')->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;
        $response['info']    = __('info.global.logout_success');

        auth('api')->logout();

        //Return json response
        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->respondWithToken($this->guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     *
     *
     * @param  string                          $token
     * @param  string                          $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $user, $permission) {
        $date = Carbon::now()->addSeconds(auth('api')->factory()->getTTL() * 60)->toDateTimeString();

        $date_miliseconds = (strtotime($date) * 1000);

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $date_miliseconds,
            'user'         => $user,
            'permission'   => $permission,
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard() {
        return Auth::guard();
    }
}
