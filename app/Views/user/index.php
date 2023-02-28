<?= show_msg() ?>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $q ?>" />
            </div>
            <div class="form-group mr-1">
                <a class="btn btn-primary" href="<?= site_url('user/create') ?>"><span class="fa fa-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <!-- <th>Level</th> -->
                    <th>Username</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->kode_user ?></td>
                    <td><?= $row->nama_user ?></td>
                    <!-- <td><?= $row->level ?></td> -->
                    <td><?= $row->user ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning" href="<?= site_url("user/edit/$row->kode_user") ?>"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-sm btn-danger" href="<?= site_url("user/destroy/$row->kode_user") ?>" onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>