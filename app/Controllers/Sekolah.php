<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Sekolah extends BaseController
{
    public function index()
    {
        query("DELETE FROM tb_penilaian WHERE kode_sekolah NOT IN (SELECT kode_sekolah FROM tb_sekolah)");

        $data['title'] = 'Sekolah';
        $data['q'] = $this->request->getGet('q');
        $sekolah = new SekolahModel();
        $data['rows'] = $sekolah->like('kode_sekolah', (string) $data['q'])->orLike('nama_sekolah', '' . $data['q'])->findAll();
        load_view('sekolah/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Sekolah';
        load_view('sekolah/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kode_sekolah' => [
                'rules' => 'required|is_unique[tb_sekolah.kode_sekolah]',
                'errors' => [
                    'required' => 'Kode harus diisi',
                    'is_unique' => 'Kode Sekolah sudah ada',
                ],
            ],
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'ket_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bangunan harus diisi',
                ],
            ],
            'user' => [
                'rules' => 'required|is_unique[tb_sekolah.user]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah ada',
                ],
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $kode_sekolah = $this->request->getPost('kode_sekolah');
            $sekolah = new SekolahModel();
            $sekolah->insert([
                'kode_sekolah' => $kode_sekolah,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'ket_sekolah' => $this->request->getPost('ket_sekolah'),
                'user' => $this->request->getPost('user'),
                'pass' => password_hash($this->request->getPost('pass'), PASSWORD_BCRYPT),
            ]);
            query("INSERT INTO tb_penilaian (kode_sekolah, kode_kriteria) SELECT '$kode_sekolah', kode_kriteria FROM tb_kriteria");
            return redirect()->to('/sekolah')->with('msg', ['success', 'Data berhasil ditambah!']);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Sekolah';
        $sekolah = new SekolahModel();
        $data['row'] = $sekolah->find($id);
        load_view('sekolah/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'ket_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bangunan harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $user = $this->request->getPost('user');
            if (get_var("SELECT * FROM tb_penilaian WHERE user='$user' AND kode_sekolah<>'$id'"))
                return redirect()->back()->withInput()->with('error', 'Username sudah ada!');

            $sekolah = new SekolahModel();
            $data = [
                'kode_sekolah' => $id,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'ket_sekolah' => $this->request->getPost('ket_sekolah'),
                'user' => $this->request->getPost('user'),
            ];
            if ($this->request->getPost('pass'))
                $data['pass'] = password_hash($this->request->getPost('pass'), PASSWORD_BCRYPT);

            $sekolah->save($data);
            return redirect()->to('/sekolah')->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }

    public function destroy($id)
    {
        $sekolah = new SekolahModel();
        $sekolah->delete($id);
        return redirect()->to('/sekolah')->with('msg', ['success', 'Data berhasil dihapus!']);
    }
}
