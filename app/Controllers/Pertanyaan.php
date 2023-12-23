<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PertanyaanModel;

class Pertanyaan extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
    }

    public function index()
    {
        $data['pertanyaan'] = $this->pertanyaanModel->findAll();

        return view('admin/pertanyaan/index', $data);
    }

    public function create()
    {
        return view('admin/pertanyaan/form_create');
    }

    public function store()
    {
        $data = [
            'PertanyaanText' => $this->request->getPost('PertanyaanText'),
            'Kategori' => $this->request->getPost('Kategori'),
            'Bobot' => $this->request->getPost('Bobot'),
        ];

        $this->pertanyaanModel->insert($data);

        return redirect()->to('/admin/pertanyaan/index');
    }

    public function edit($id)
    {
        $data['pertanyaan'] = $this->pertanyaanModel->find($id);

        return view('admin/pertanyaan/form_edit', $data);
    }

    public function update($id)
    {
        $data = [
            'PertanyaanText' => $this->request->getPost('PertanyaanText'),
            'Kategori' => $this->request->getPost('Kategori'),
            'Bobot' => $this->request->getPost('Bobot'),
        ];

        $this->pertanyaanModel->update($id, $data);

        return redirect()->to('/admin/pertanyaan/index');
    }

    public function delete($id)
    {
        $this->pertanyaanModel->delete($id);

        return redirect()->to('/admin/pertanyaan/index');
    }
}
