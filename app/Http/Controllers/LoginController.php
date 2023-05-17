<?php

namespace App\Http\Controllers;

use App\Http\Service\PenulisService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $servicePenulis;

    public function __construct()
    {
        $this->servicePenulis = new PenulisService();
    }
    //
    public function forPenulis()
    {
        return view('penulis.login');
    }

    public function loginPenulis(Request $request)
    {
        
        $username = $request->get('username');
        $password = $request->get('password');
        $res = $this->servicePenulis->findByUsername($username);
     
        if (isset($res)) {
            
            if ($res->password == $password) {
                
                return redirect(route('penulis.dashboard'))->with([
                    'status' => 'success',
                    'message' => 'Berhasil melakukan login sebagai penulis'
                ]);
            } else {
                
                return redirect()->back()->with([
                    'status' => 'fail',
                    'message' => 'Gagal login, password salah'
                ]);
            }
        } else {
            return redirect()->back()->with([
                'status' => 'fail',
                'message' => 'Gagal login, username tidak terdaftar'
            ]);
        }
    }
}
