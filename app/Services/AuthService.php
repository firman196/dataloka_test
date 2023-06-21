<?php

namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;
use DB;
use File;

class AuthService {

    public function __construct(){
        $this->pelangganRepository  = new \App\Repositories\PelangganRepository;
    }

    /**
     * Login Pelanggan Auth
     * @param Request $request
     * @return collection
     * @throws Exception
     */
    public function login($request){
        try{
            $credentials = [
                'username'      => $request['nim'],
                'password'      => $request['password'],
                'status_akun'   => "aktif"
            ];
    
            $token = Auth::attempt($credentials);
            if (!$token) {
                return false;
            }
            return $token;
        }catch(\Exception $e){
            throw new InvalidArgumentException('Maaf terjadi kesalahan pada sistem');
        }
    }

    /**
     * Logout Pelanggan Auth
     * @return boolean
     */
    public function logout()
    {
        try {
            Auth::logout();
            return true;
        } catch (\Exception $e) {
            return false;
        }
       
    }
}