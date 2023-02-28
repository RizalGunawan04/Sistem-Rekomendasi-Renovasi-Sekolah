<table class="table table-bordered table-hover table-striped m-0 text-center">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Bangunan</th>
            <th>Total Preferensi</th>
            <th>Total Kerusakan</th>
            <th>Tingkat Kerusakan</th>
            <th>Keterangan Hasil</th>
        </tr>
    </thead>
    <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row->rank ?></td>
            <td><?= $row->kode_sekolah ?></td>
            <td><?= $row->nama_sekolah ?></td>
            <td><?= $row->ket_sekolah ?></td>
            <td><?= round($row->total, 4) ?></td>
            <td><?= round($row->penilaian_total, 4) ?></td>
            <td><?= $row->tingkat_kerusakan ?></td>
            <td><?= $row->ket_hasil ?></td>
        </tr>
    <?php endforeach ?>
</table>