<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'tb_penilaian';
    protected $primaryKey = 'ID';
    protected $returnType = "object";
    protected $allowedFields = ['kode_sekolah', 'kode_kriteria', 'nilai'];
}
