<?php

namespace App\Http\Controllers;

use App\Http\Service\PenulisService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisAuthController extends Controller
{
    //
    private $servicePenulis;

    public function __construct()
    {
        $this->servicePenulis = new PenulisService();
    }
    //
    public function index()
    {
        return view('penulis.login');
    }

    public function login(Request $request)
    {

        $username = $request->get('username');
        $password = $request->get('password');
        $res = $this->servicePenulis->findByUsername($username);

        if (isset($res)) {

            if ($res->password == $password) {
                if ($res->status == "aktif") {

                    session(['id' => $res->id, 'username' => $res->username, 'status' => $res->status,'role'=>'penulis']);
                    return redirect(route('penulis.dashboard'))->with([
                        'status' => 'success',
                        'message' => 'Berhasil melakukan login sebagai penulis'
                    ]);
                } else {
                    return back()->with([
                        'status' => 'fail',
                        'message' => 'gagal melakukan login karena akun belum diaktifasi'
                    ]);
                }
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

    public function registerPage()
    {
        return view('penulis.register');
    }

    public function register(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $confirmPassword = $request->get('confirm-password');

        if ($password == $confirmPassword) {
            $find = $this->servicePenulis->findByUsername($username);
            if (isset($find)) {
                return back()->with([
                    'status' => 'fail',
                    'message' => 'gagal mendaftarkan akun, username sudah digunakan'
                ]);
            }
            $res = $this->servicePenulis->create($username, $password);
            if (isset($res)) {
                return redirect(route('penulis.auth.login.page'))->with(
                    [
                        'status' => 'success',
                        'message' => 'Berhasil melakukan Mendaftarkan akun'
                    ]
                );
            } else {
                return back()->with(
                    [
                        'status' => 'fail',
                        'message' => 'gagal mendaftarkan akun, terjadi masalah'
                    ]
                );
            }
        } else {
            return back()->with(
                [
                    'status' => 'danger',
                    'message' => 'confir password salah'
                ]
            );
        }
    }

    public function logout()
    {
        try {
            session()->forget(['id','username']);
            return redirect(route('admin.auth.login.page'))->with(
                        [
                            'status' => 'success',
                            'message' => 'Berhasil logout'
                        ]
                    );
        } catch (Exception $th) {
            return back()->with([
                        'status' => 'fail',
                        'message' => 'gagal logout, '.$th
                    ]);
        }
    }
}
