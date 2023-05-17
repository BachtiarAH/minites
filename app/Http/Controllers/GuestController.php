<?php

namespace App\Http\Controllers;

use App\Http\Service\ArtikelService;
use App\Http\Service\DetailService;
use App\Http\Service\KomentarService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    private $artikelService,$detailService,$komentarService;


    public function __construct() {
        $this->artikelService = new ArtikelService();
        $this->detailService = new DetailService();
        $this->komentarService = new KomentarService();
    }

    public function index()
    {
        $artikel = $this->artikelService->findAll();
        return view('welcome',['artikel'=>$artikel]);
    }

    public function artikel($id)
    {
        $artikel = $this->artikelService->findById($id);
        $komentar = $this->detailService->findByIdArtikel($id);

        return view('artikel',['artikel'=>$artikel,'komentar'=>$komentar]);
    }

    public function komentar(Request $request)
    {
        // dd($request);
        $idArtikel = $request->get('id');
        $nama = $request->get('nama');
        $email = $request->get('email');
        $komentar = $request->get('komentar');

        $res = $this->komentarService->create($idArtikel,$nama,$komentar,$email);

        if ($res) {
            return back()->with([
                'status'=>'success',
                'message'=>'komentar berhasil diposting'
            ]);
        } else {
            return back()->with([
                'status'=>'fail',
                'message'=>'komentar gagal diposting, terjadi masalah'
            ]);
        }
        
    }
}
