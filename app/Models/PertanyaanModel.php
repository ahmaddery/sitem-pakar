<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanyaanModel extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'IDPertanyaan';
    protected $allowedFields = ['PertanyaanText', 'Kategori', 'Bobot'];
}
