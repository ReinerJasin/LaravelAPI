<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request){
        $http = new \GuzzleHttp\Client;

        $user=[
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3,
            'is_verified' =>'1',
            'is_login' => '0',
            'is_active' => '1',
        ];

        $check = DB::table('users')->where('email', $request->email)->first();

        if($check->is_verified == '1'){
            if($check->is_active == '1'){
                if($check->is_login =='0'){
                    if(Auth::attempt($user)){

                        $this->isLogin(Auth::id());

                        // $response = $http->post('http://127.0.0.1:8000/oauth/token', [
                        //     'form_params' => [
                        //         'grant_type' => 'password',
                        //         'client_id' => $this->client->id,
                        //         'client_secret' => $this->client->secret,
                        //         'username' => $request->email,
                        //         'password' => $request->password,
                        //         'scope' => '*',
                        //     ]
                        // ]);

                        $params = [
                            'grant_type' => 'password',
                            'client_id' => $this->client->id,
                            'client_secret' => $this->client->secret,
                            'username' => request('email'),
                            'password' => request('password'),
                            'scope' => '*',
                        ];

                        $request->request->add($params);
                        $proxy = Request::create('oauth/token', 'POST');
                        return Route::dispatch($proxy);

                        // return json_decode((string) $response->getBody(), true);
                    
                    } else {
                        return response([
                            'message' => 'Login Failed'
                        ]);
                    }
                } else {
                    return response([
                        'message' => 'Account in use'
                    ]);
                }
            } else {
                return response([
                    'message' => 'Account suspended'
                ]);
            }
        } else {
            return response([
                'message' => 'Please verify email address'
            ]);
        }
    }

    private function isLogin(int $id){
    
        $acc = User::findOrFail($id);
    
        return $acc->update([
            'is_login' => '1',
        ]);
    }

}