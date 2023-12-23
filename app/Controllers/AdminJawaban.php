<?php

namespace App\Controllers;

use App\Models\JawabanModel;
use CodeIgniter\Controller;

class AdminJawaban extends Controller
{
    public function index()
    {
        $model = new JawabanModel();

        // Get filter parameters from the URL
        $idPengguna = $this->request->getGet('idPengguna');
        $idPertanyaan = $this->request->getGet('idPertanyaan');

        // Check if any filters are provided
        if ($idPengguna !== null || $idPertanyaan !== null) {
            // Use where conditions based on the provided filters
            $data['jawaban'] = $model->where('IDPengguna', $idPengguna)->where('IDPertanyaan', $idPertanyaan)->findAll();
        } else {
            // If no filters, fetch all data
            $data['jawaban'] = $model->findAll();
        }

        return view('admin/jawaban/index', $data);
    }

    public function delete($id)
    {
        $model = new JawabanModel();
        $model->delete($id);

        return redirect()->to('/admin/jawaban');
    }
}
