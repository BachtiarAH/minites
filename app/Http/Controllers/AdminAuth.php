<?php

namespace App\Http\Controllers;

use App\Http\Service\AdminService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth extends Controller
{
    private $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
    }
    //
    public function index()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $res = $this->adminService->findByUsername($username);

        // dd(isset($res));

        if (isset($res)) {
            if ($res->password == $password) {
                session(['id' => $res->id, 'username' => $res->username,'role'=>'admin']);
                // return session('role');
                    return redirect(route('admin.dashboard'))->with([
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

    public function logout()
    {
        // if (session_reset()) {
        //     return redirect(route('penulis.auth.login.page'))->with(
        //         [
        //             'status' => 'success',
        //             'message' => 'Berhasil logout'
        //         ]
        //     );
        // } else {
        //     return back()->with([
        //         'status' => 'fail',
        //         'message' => 'gagal logout'
        //     ]);
        // }
        try {
            Session::flush();
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
