<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use MAUT;

class Hitung extends BaseController
{
    public function index()
    {
        query("DELETE FROM tb_penilaian WHERE kode_sekolah NOT IN (SELECT kode_sekolah FROM tb_sekolah)");

        $data['title'] = 'Perhitungan';
        $data['penilaian'] = get_penilaian();
        $data['kriteria'] = get_kriteria();
        $data['sekolah'] = get_sekolah();
        // $data['penilaian'] = [];
        // $data['sekolah'] = [];
        // $data['kriteria'] = [];
        $data['bobot'] = [];
        foreach ($data['kriteria'] as $key => $val) {
            $data['bobot'][$key] = $val->bobot;
        }
        $data['maut'] = new MAUT($data['penilaian'],  $data['bobot']);
        $data['series'] = array();
        $data['categories'] = array();
        foreach ($data['sekolah'] as $key => $val) {
            $data['categories'][$key] = $val->nama_sekolah;
            $data['series'][$key] = $data['maut']->total[$key];
        }
        $data['categories'] = array_values($data['categories']);
        $data['series'] = array_values($data['series']);
        foreach ($data['maut']->rank as $key => $val) {
            $total = $data['maut']->total[$key];
            $penilaian_total = array_sum($data['penilaian'][$key]);
            $tingkat_kerusakan = get_tingkat_kerusakan($penilaian_total);
            $ket_hasil = get_ket_hasil($tingkat_kerusakan);
            query("UPDATE tb_sekolah SET rank='$val', total='$total', penilaian_total='$penilaian_total', tingkat_kerusakan='$tingkat_kerusakan', ket_hasil='$ket_hasil' WHERE kode_sekolah='$key'");
        }
        $data['sekolah'] = get_sekolah();
        load_view('hitung/index', $data);
    }

    public function hasil()
    {
        $data['title'] = 'Hasil Perhitungan';
        $data['kriteria'] = get_kriteria();
        $rows = get_results("SELECT * FROM tb_hasil ORDER BY periode, kode_kriteria");
        $arr = array();
        foreach ($rows as $row) {
            $arr[$row->periode][$data['kriteria'][$row->kode_kriteria]->nama_kriteria] = $row->nilai;
        }
        $data['hasil'] = $arr;
        load_view('hitung/hasil', $data);
    }

    public function cetak()
    {
        $data['title'] = 'Laporan Hasil Rekomendasi';
        $data['q'] = $this->request->getGet('q');
        $sekolah = new SekolahModel();
        $data['rows'] = $sekolah->like('kode_sekolah', (string) $data['q'])->orLike('nama_sekolah', '' . $data['q'])->orderBy('rank')->findAll();
        load_view_cetak('hitung/cetak', $data);
    }
}
