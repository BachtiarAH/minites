<?php
namespace App\Http\Service;

use App\Models\KomentarModel;

class KomentarService extends Service{
    protected KomentarModel $komentar;
    protected DetailService $detailService;

    public function __construct() {
        $this->komentar = new KomentarModel();
        $this->detailService = new DetailService();
    }

    public function create($idArtikel,$name, $komentar, $email)
    {
        $resKom =  $this->komentar->create([
            'nama'=>$name,
            'isi_komentar'=>$komentar,
            'email'=>$email
        ]);

        echo $resKom->id;

        $resDet = $this->detailService->create($idArtikel,$resKom->id);

        return $resKom && $resDet;
    }

    public function findAll()
    {
        $this->komentar->get();
    }


}