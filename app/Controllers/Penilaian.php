<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\PenilaianModel;

class Penilaian extends BaseController
{
    public function index()
    {
        $data['title'] = 'Nilai Kerusakan';
        $data['q'] = $this->request->getGet('q');
        $sekolah = new SekolahModel();
        $data['rows'] = $sekolah->like('kode_sekolah', (string) $data['q'])->orLike('nama_sekolah', '' . $data['q'])->findAll();
        $data['penilaian'] = get_penilaian();
        $data['kriteria'] = get_kriteria();
        load_view('penilaian/index', $data);
    }

    public function profil()
    {
        $id = session()->get('ID');
        $data['title'] = 'Profil Bangunan Sekolah';
        $sekolah = new SekolahModel();
        $data['sekolah'] = $sekolah->find($id);
        $data['penilaian'] = get_results("SELECT * FROM tb_penilaian WHERE kode_sekolah='$id'");
        $data['kriteria'] = get_kriteria();
        load_view('penilaian/profil', $data);
    }

    public function profil_update()
    {
        $id = session()->get('ID');
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
            'nilai.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semua nilai harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $sekolah = new SekolahModel();
            $data = [
                'kode_sekolah' => $id,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'ket_sekolah' => $this->request->getPost('ket_sekolah'),
            ];
            $bukti = $this->request->getFile('bukti');
            if ($bukti->getName()) {
                $filename = rand(1000, 9999) . $bukti->getName();
                $bukti->move('bukti/', $filename);
                $data['bukti'] = $filename;
            }
            foreach ($this->request->getPost('nilai') as $key => $val) {
                $penilaian = new PenilaianModel();
                $penilaian->where('ID', $key);
                $penilaian->set('nilai', $val);
                $penilaian->update();
            }
            $data['penilaian_total'] = array_sum($this->request->getPost('nilai'));
            $data['tingkat_kerusakan'] = get_tingkat_kerusakan($data['penilaian_total']);
            $data['ket_hasil'] = get_ket_hasil($data['tingkat_kerusakan']);

            $sekolah->save($data);

            return redirect()->back()->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Nilai';
        $sekolah = new SekolahModel();
        $data['sekolah'] = $sekolah->find($id);
        $data['penilaian'] = get_results("SELECT * FROM tb_penilaian WHERE kode_sekolah='$id'");
        $data['kriteria'] = get_kriteria();
        load_view('penilaian/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nilai.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semua nilai harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            foreach ($this->request->getPost('nilai') as $key => $val) {
                $penilaian = new PenilaianModel();
                $penilaian->where('ID', $key);
                $penilaian->set('nilai', $val);
                $penilaian->update();
            }

            return redirect()->to('/penilaian')->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }

    public function destroy($id)
    {
        $sekolah = new PenilaianModel();
        query("DELETE FROM tb_penilaian WHERE kode_sekolah='$id'");
        $sekolah->delete($id);
        return redirect()->to('/sekolah')->with('msg', ['success', 'Data berhasil dihapus!']);
    }
}
