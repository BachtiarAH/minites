<?php
namespace App\Http\Service;

use App\Models\PenulisModel;

class PenulisService extends Service{
    protected $penulis;

    public function __construct() {
        $this->penulis = new PenulisModel();
    }
}