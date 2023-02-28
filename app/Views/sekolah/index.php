<?= show_msg() ?>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $q ?>" />
            </div>
            <div class="form-group mr-1">
                <a class="btn btn-primary" href="<?= site_url('sekolah/create') ?>"><span class="fa fa-plus"></span> Tambah</a>
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
                    <th>User</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->kode_sekolah?></td>
                    <td><?= $row->nama_sekolah ?></td>
                    <td><?= $row->ket_sekolah ?></td>
                    <td><?= $row->user ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning" href="<?= site_url("sekolah/edit/$row->kode_sekolah") ?>"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-sm btn-danger" href="<?= site_url("sekolah/destroy/$row->kode_sekolah") ?>" onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>