<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'kode_user';
    protected $returnType = "object";
    protected $useAutoIncrement = false;
    protected $allowedFields = ['kode_user', 'nama_user', 'user', 'pass', 'level'];
}
