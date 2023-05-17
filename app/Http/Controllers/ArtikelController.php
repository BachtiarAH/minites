<?php

namespace App\Http\Controllers;

use App\Http\Service\ArtikelService;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    protected ArtikelService $artikelService;
    
    public function __construct() {
        $this->artikelService = new ArtikelService();
    }
    
    public function index()
    {
        $artikels = $this->artikelService->findAllWithPenulis();
        return view('admin.pages.artikel',['artikels'=>$artikels]);
    }

    public function showMyArtikel()
    {
        // dd(session('id'));
        $artikel = $this->artikelService->findByPenulis(session('id'));
        // dd($artikel);
        return view('penulis.artikel',['artikels'=>$artikel]);
    }

    public function post(Request $request)
    {
        // dd($request);
        $judul = $request->get('judul');
        $artikel = $request->get('artikel');
        $res = $this->artikelService->create($judul,$artikel,2,now());
        // dd($this->artikelService->create($judul,$artikel,2,now()));

        if (isset($res)) {
            echo "berhasil";
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Artikel berhasil di POST!'
            ]);
        } else {
            echo "gagal";
            return redirect()->back()->with([
                'status' => 'fail',
                'message' => 'Artikel gagal di post, terjadi kesalahan'
            ]);
        }
        
    }

    public function edit($id)
    {
        $artikel = $this->artikelService->findById($id);
        // dd($artikel);
        return view('penulis.edit',['artikel'=>$artikel]);
    }

    public function put(Request $request)
    {
        $id = $request->get('id');
        $judul = $request->get('judul');
        $isi = $request->get('artikel');
        $idPenulis = session('id');
        $res = $this->artikelService->update($id,$judul,$isi,$idPenulis,now());
        if ($res) {
            return redirect(route('penulis.artikel.daftar'))->with([
                'status'=>'success',
                'message'=>'artikel berhasi di edit'
            ]);
        } else {
            return back()->with([
                'status'=>'fail',
                'message'=>'artikel gagal di edit'
            ]);
        }
        
    }

    public function delete(Request $request)
    {
        $res = $this->artikelService->delete($request->get('id'));
        // dd($res);
        if ($res>0) {
            return back()->with([
                'status'=>'success',
                'message'=>'artikel berhasi di hapus'
            ]);
        } else {
            return back()->with([
                'status'=>'fail',
                'message'=>'artikel gagal di hapus'
            ]);
        }
    }
    
}
