<?php

namespace App\Controllers;

use App\Models\AturanModel;

class AturanController extends BaseController
{
    public function index()
    {
        // Membuat instance model
        $model = new AturanModel();
    
        // Mendapatkan semua aturan dengan pagination
        $data['aturan'] = $model->paginate(5); // 5 records per page
    
        // Mendapatkan pager
        $data['pager'] = $model->pager;
    
        // Menampilkan view dengan data aturan dan pager
        return view('admin/aturan/index', $data);
    }
    

    public function detail($id)
    {
        // Membuat instance model
        $model = new AturanModel();

        // Mendapatkan aturan berdasarkan IDAturan
        $data['aturan'] = $model->getRuleById($id);

        // Menampilkan view dengan data aturan
        return view('admin/aturan/detail', $data);  
    }

    public function create()
    {
        // Menampilkan form tambah aturan
        return view('admin/aturan/create');
    }

    public function store()
    {
        // Membuat instance model
        $model = new AturanModel();

        // Validasi input (jika diperlukan)

        // Menambahkan aturan baru
        $data = [
            'Kondisi' => $this->request->getPost('kondisi'),
            'TipeKepribadian' => $this->request->getPost('tipe_kepribadian'),
        ];

        $model->addRule($data);

        // Redirect ke halaman index atau halaman lainnya
        return redirect()->to('admin/aturan');
    }

    public function edit($id)
    {
        // Membuat instance model
        $model = new AturanModel();

        // Mendapatkan aturan berdasarkan IDAturan
        $data['aturan'] = $model->getRuleById($id);

        // Menampilkan form edit aturan
        return view('admin/aturan/edit', $data);
    }

    public function update($id)
    {
        // Membuat instance model
        $model = new AturanModel();

        // Validasi input (jika diperlukan)

        // Mengubah aturan berdasarkan IDAturan
        $data = [
            'Kondisi' => $this->request->getPost('kondisi'),
            'TipeKepribadian' => $this->request->getPost('tipe_kepribadian'),
        ];

        $model->updateRule($id, $data);

        // Redirect ke halaman index atau halaman lainnya
        return redirect()->to('admin/aturan');
    }

    public function delete($id)
    {
        // Membuat instance model
        $model = new AturanModel();

        // Menghapus aturan berdasarkan IDAturan
        $model->deleteRule($id);

        // Redirect ke halaman index atau halaman lainnya
        return redirect()->to('admin/aturan');
    }
}
