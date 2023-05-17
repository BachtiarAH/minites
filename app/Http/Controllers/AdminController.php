<?php

namespace App\Http\Controllers;

use App\Http\Service\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    private $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
    }
    public function index()
    {
        $admin = $this->adminService->findAll();
        return view('admin.pages.admin',['admin'=>$admin]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $username = $request->get('username');
        $password = $request->get('password');

        $res = $this->adminService->update($id,$username,$password);

        if (isset($res)) {
            echo "berhasil";
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'akun berhasil di edit'
            ]);
        } else {
            echo "gagal";
            return redirect()->back()->with([
                'status' => 'fail',
                'message' => 'akun gagal di edit, terjadi kesalahan'
            ]);
        }
    }

    public function store(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $res = $this->adminService->create($username,$password);
        if (isset($res)) {
            echo "berhasil";
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'akun berhasil di buat'
            ]);
        } else {
            echo "gagal";
            return redirect()->back()->with([
                'status' => 'fail',
                'message' => 'akun gagal di buat, terjadi kesalahan'
            ]);
        }
    }

    public function setting()
    {
        $profil = $this->adminService->findById(session('id'));
        return view('admin.pages.setting',['profil'=>$profil]);
    }

    public function updateProfil(Request $request)
    {
        $id = session('id');
        $username = $request->get('username');
        $password = $request->get('password');
        $res = $this->adminService->update($id,$username,$password);

        if ($res) {
            return back()->with([
                'status' => 'success',
                'message' => 'success mengupdate data akun'
            ]);
        } else {
            return back()->with([
                'status' => 'fail',
                'message' => 'gagal mengupdate data akun, terjadi kesalahan'
            ]);
        }
    }
    
}
