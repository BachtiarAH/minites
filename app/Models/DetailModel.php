<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    use HasFactory;
    protected $table = "table_detail";
    
    protected $fillable = [
        'id_artikel','id_komentar'
    ];
}
