<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    public function index()
    {
        query("DELETE FROM tb_penilaian WHERE kode_kriteria NOT IN (SELECT kode_kriteria FROM tb_kriteria)");
        $data['title'] = 'Kriteria';
        $data['q'] = $this->request->getGet('q');
        $kriteria = new KriteriaModel();
        $data['rows'] = $kriteria->like('kode_kriteria', (string) $data['q'])->orLike('nama_kriteria', '' . $data['q'])->findAll();
        load_view('kriteria/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kriteria';
        load_view('kriteria/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kode_kriteria' => [
                'rules' => 'required|is_unique[tb_kriteria.kode_kriteria]',
                'errors' => [
                    'required' => 'Kode harus diisi',
                    'is_unique' => 'Kode Kriteria sudah ada',
                ],
            ],
            'nama_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'bobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $kriteria = new KriteriaModel();
            $kode_kriteria = $this->request->getPost('kode_kriteria');
            $kriteria->insert([
                'kode_kriteria' => $kode_kriteria,
                'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            query("INSERT INTO tb_penilaian (kode_sekolah, kode_kriteria) SELECT kode_sekolah, '$kode_kriteria' FROM tb_sekolah");
            return redirect()->to('/kriteria')->with('msg', ['success', 'Data berhasil ditambah!']);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Kriteria';
        $kriteria = new KriteriaModel();
        $data['row'] = $kriteria->find($id);
        load_view('kriteria/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'bobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $kriteria = new KriteriaModel();
            $kriteria->save([
                'kode_kriteria' => $id,
                'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            return redirect()->to('/kriteria')->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }

    public function destroy($id)
    {
        $kriteria = new KriteriaModel();
        $kriteria->delete($id);
        return redirect()->to('/kriteria')->with('msg', ['success', 'Data berhasil dihapus!']);
    }
}
