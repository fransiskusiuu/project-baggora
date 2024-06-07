<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangBekas extends Model
{
    use HasFactory;

    protected $table = 'tb_barangbekas';
    protected $primaryKey = 'id_barang';

    protected $fillable = ['image', 'file', 'nama_merk', 'nama_barang', 'harga', 'kuantitas', 'penawaran'];
}
