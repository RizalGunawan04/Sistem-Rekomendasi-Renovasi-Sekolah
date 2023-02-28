<div class="row">
    <div class="col-sm-6">
        <?= print_error() ?>
        <form method="post" action="<?= site_url('user/update/' . $row->kode_user) ?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_user" value="<?= old('kode_user', $row->kode_user) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_user" value="<?= old('nama_user', $row->nama_user) ?>" />
            </div>
            <div class="form-group" hidden>
                <label>Level <span class="text-danger">*</span></label>
                <select class="form-control" name="level">
                    <?= get_level_option(old('level', $row->level)) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?= old('user', $row->user) ?>" />
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?= old('pass') ?>" />
                <p class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('user') ?>"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>