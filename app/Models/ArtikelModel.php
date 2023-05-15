<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    use HasFactory;

    protected $table = 'table_artikel';

    protected $fillable=[
        'judul_artikel','isi_artikel','id_penulis','tanggal'
    ];
}
