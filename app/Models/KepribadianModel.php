<?php

namespace App\Models;

use CodeIgniter\Model;

class KepribadianModel extends Model
{
    protected $table = 'kepribadian';
    protected $primaryKey = 'IDKepribadian';
    protected $allowedFields = ['Kode', 'Kepribadian', 'TipeKepribadian', 'Keterangan', 'Deskripsi'];
}
