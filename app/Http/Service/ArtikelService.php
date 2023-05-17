<?php

namespace App\Http\Service;

use App\Models\ArtikelModel;
use Illuminate\Support\Facades\DB;

class ArtikelService extends Service
{
    protected ArtikelModel $artikel;

    public function __construct()
    {
        $this->artikel = new ArtikelModel();
    }

    public function create($judul,$isi,$idPenulis,$tanggal)
    {
        return $this->artikel->create([
            'judul_artikel'=>$judul,
            'isi_artikel'=>$isi,
            'id_penulis'=>$idPenulis,
            'tanggal'=>$tanggal
        ]);
    }

    public function findAll()
    {
        return $this->artikel->get();
    }
    
    public function findAllWithPenulis()
    {
        return DB::table('table_artikel')
        ->join('table_penulis', 'table_penulis.id', '=', 'table_artikel.id_penulis')
        ->select('table_artikel.judul_artikel AS judul', 'table_penulis.username AS penulis', 'table_artikel.tanggal','table_artikel.id')->get();
    }

    public function findByPenulis($idPenulis)
    {
        return DB::table('table_artikel')
        ->join('table_penulis', 'table_penulis.id', '=', 'table_artikel.id_penulis')
        ->select('table_artikel.judul_artikel AS judul', 'table_penulis.username AS penulis', 'table_artikel.tanggal', 'table_artikel.id_penulis','table_artikel.id')
        ->where('table_artikel.id_penulis','=',$idPenulis)->get();
    }

    public function findById($id)
    {
        return $this->artikel->where('id',$id)->first();
    }

    public function findByJudul($judul)
    {
        return $this->artikel->where('judul_artikel',$judul)->first();
    }

    public function update($id,$judul,$isi,$idPenulis,$tanngal)
    {
        return $this->artikel->find($id)->update([
            'judul_artikel'=>$judul,
            'isi_artikel'=>$isi,
            'id_penulis'=>$idPenulis,
            'tanggal'=>$tanngal
        ]);
    }

    public function delete($id)
    {
        return $this->artikel->where('id',$id)->delete();
    }
}
