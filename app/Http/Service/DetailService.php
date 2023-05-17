<?php
namespace App\Http\Service;

use App\Models\DetailModel;
use Illuminate\Support\Facades\DB;

class DetailService extends Service{
    protected DetailModel $detail;

    public function __construct() {
        $this->detail = new DetailModel();
    }

    public function create($idArtikel,$idKomentar)
    {
        return $this->detail->create([
        'id_artikel'=>$idArtikel,'id_komentar'=>$idKomentar
        ]);
    }

    public function findAll()
    {
        return $this->detail->get();
    }

    public function findByIdArtikel($idArtikel)
    {
        return DB::table('table_detail')
                    ->join('table_artikel','table_artikel.id','=','table_detail.id_artikel')
                    ->join('table_komentar','table_komentar.id','=','table_detail.id_komentar')
                    ->select()->get();
    }

    
}