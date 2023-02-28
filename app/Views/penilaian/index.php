<?= show_msg() ?>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $q ?>" />
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Bangunan</th>
                    <th>Bukti</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->kode_sekolah ?></td>
                    <td><?= $row->nama_sekolah ?></td>
                    <td><?= $row->ket_sekolah ?></td>
                    <td><?= get_file_link('bukti/', $row->bukti) ?></td>
                    <?php foreach ($penilaian[$row->kode_sekolah] as $key => $val) : ?>
                        <td><?= $val ?>%</td>
                    <?php endforeach ?>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning" href="<?= site_url("penilaian/edit/$row->kode_sekolah") ?>"><span class="fa fa-edit"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>