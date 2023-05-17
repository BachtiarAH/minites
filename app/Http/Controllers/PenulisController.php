<?php

namespace App\Http\Controllers;

use App\Http\Service\PenulisService;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    private $penulisService;

    public function __construct()
    {
        $this->penulisService = new PenulisService();
    }
    //
    public function index()
    {
        $penulis = $this->penulisService->findAll();
        return view('admin.pages.penulis', ['penulis' => $penulis]);
    }

    public function dashboard()
    {
        return view('penulis.dashboard');
    }



    public function buatArtikel()
    {
        return view('penulis.buat');
    }

    public function editArtikel($id)
    {
        return view('penulis.edit', ['id' => $id]);
    }

    public function store(Request $request)
    {
        return "fungsi post artikel";
        dd($request);
    }

    public function update(Request $request)
    {
        // dd($request);
        $id = $request->get('id');
        $username = $request->get('username');
        $status = $request->get('status');
        // dd($status);
        $res = $this->penulisService->updateWithoutPassword($id, $username, $status);
        // dd($res);
        if ($res) {
            return back()->with([
                'status' => 'success',
                'message' => 'success mengupdate data penulis'
            ]);
        } else {
            return back()->with([
                'status' => 'fail',
                'message' => 'gagal mengupdate data penulis, terjadi kesalahan'
            ]);
        }
    }


    public function setting()
    {
        $profil = $this->penulisService->findById(session('id'));
        return view('penulis.setting', ['profil' => $profil]);
    }

    public function updateProfil(Request $request)
    {
        $id = session('id');
        $username = $request->get('username');
        $password = $request->get('password');
        $res = $this->penulisService->update($id,$username,$password,'aktif');

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
