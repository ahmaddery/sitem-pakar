<?php

namespace App\Models;

use CodeIgniter\Model;

class AturanModel extends Model
{
    protected $table = 'aturan';
    protected $primaryKey = 'IDAturan';
    protected $allowedFields = ['Kondisi', 'TipeKepribadian'];

    // Fungsi untuk mendapatkan semua aturan
    public function getAllRules()
    {
        return $this->findAll();
    }

    // Fungsi untuk mendapatkan aturan berdasarkan IDAturan
    public function getRuleById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menambahkan aturan baru
    public function addRule($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk mengubah aturan berdasarkan IDAturan
    public function updateRule($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fungsi untuk menghapus aturan berdasarkan IDAturan
    public function deleteRule($id)
    {
        return $this->delete($id);
    }

    // Fungsi untuk mendapatkan aturan dengan pagination
    public function getAturanPaginated($perPage, $offset)
    {
        $builder = $this->db->table($this->table);
        $builder->limit($perPage, $offset);
        return $builder->get()->getResultArray();
    }

    // Fungsi untuk mendapatkan total jumlah aturan
    public function getTotalRules()
    {
        return $this->countAllResults();
    }

    public function getAturanIdByTipeKepribadian($tipeKepribadian)
    {
        return $this->where('TipeKepribadian', $tipeKepribadian)->first('IDAturan');
    }
    
    
}
