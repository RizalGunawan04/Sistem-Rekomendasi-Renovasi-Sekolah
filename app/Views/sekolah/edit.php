<div class="row">
    <div class="col-sm-6">
        <?= print_error() ?>
        <form method="post" action="<?= site_url('sekolah/update/' . $row->kode_sekolah) ?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_sekolah" value="<?= old('kode_sekolah', $row->kode_sekolah) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_sekolah" value="<?= old('nama_sekolah', $row->nama_sekolah) ?>" />
            </div>
            <div class="form-group">
                <label>Bangunan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ket_sekolah" value="<?= old('ket_sekolah', $row->ket_sekolah) ?>" />
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
                <a class="btn btn-danger" href="<?= site_url('sekolah') ?>"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>