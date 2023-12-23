<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KepribadianModel;

class Kepribadian extends BaseController
{
    protected $kepribadianModel;

    public function __construct()
    {
        $this->kepribadianModel = new KepribadianModel();
    }

    public function index()
    {
        $data['kepribadian'] = $this->kepribadianModel->findAll();

        return view('admin/kepribadian/index', $data);
    }

    public function create()
    {
        return view('admin/kepribadian/form_create');
    }

    public function store()
    {
        $data = [
            'Kode' => $this->request->getPost('Kode'),
            'Kepribadian' => $this->request->getPost('Kepribadian'),
            'TipeKepribadian' => $this->request->getPost('TipeKepribadian'),
            'Keterangan' => $this->request->getPost('Keterangan'),
            'Deskripsi' => $this->request->getPost('Deskripsi'),
        ];

        $this->kepribadianModel->insert($data);

        return redirect()->to('/admin/kepribadian');
    }

    public function edit($id)
    {
        $data['kepribadian'] = $this->kepribadianModel->find($id);

        return view('admin/kepribadian/form_edit', $data);
    }

    public function update($id)
    {
        $data = [
            'Kode' => $this->request->getPost('Kode'),
            'Kepribadian' => $this->request->getPost('Kepribadian'),
            'TipeKepribadian' => $this->request->getPost('TipeKepribadian'),
            'Keterangan' => $this->request->getPost('Keterangan'),
            'Deskripsi' => $this->request->getPost('Deskripsi'),
        ];

        $this->kepribadianModel->update($id, $data);

        return redirect()->to('/admin/kepribadian');
    }

    public function delete($id)
    {
        $this->kepribadianModel->delete($id);

        return redirect()->to('/admin/kepribadian');
    }
}
