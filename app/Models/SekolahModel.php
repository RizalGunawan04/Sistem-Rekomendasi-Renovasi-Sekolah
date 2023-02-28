<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'tb_sekolah';
    protected $primaryKey = 'kode_sekolah';
    protected $returnType = "object";
    protected $useAutoIncrement = false;
    protected $allowedFields = ['kode_sekolah', 'nama_sekolah', 'ket_sekolah', 'bukti', 'user', 'pass', 'total', 'rank', 'penilaian_total', 'tingkat_kerusakan', 'ket_hasil'];
}
