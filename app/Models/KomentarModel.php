<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;
    protected $table = "table_komentar";
    
    protected $fillable = [
        'nama','isi_komentar','email'
    ];
}
