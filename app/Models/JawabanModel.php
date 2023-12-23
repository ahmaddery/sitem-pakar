<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'IDJawaban';
    protected $allowedFields = ['IDPengguna', 'IDPertanyaan', 'JawabanPengguna', 'WaktuJawaban'];

    // Fungsi untuk mendapatkan jawaban pengguna berdasarkan ID pengguna
    public function getJawabanByPengguna($idPengguna)
    {
        return $this->where('IDPengguna', $idPengguna)->findAll();
    }
}