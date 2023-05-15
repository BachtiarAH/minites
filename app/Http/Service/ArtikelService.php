<?php

namespace App\Http\Service;

use App\Models\ArtikelModel;

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

    public function findById($id)
    {
        return $this->artikel->find($id);
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
        return $this->artikel->find($id)->delete();
    }
}
