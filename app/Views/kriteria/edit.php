<div class="row">
    <div class="col-sm-6">
        <?= print_error() ?>
        <form method="post" action="<?= site_url('kriteria/update/' . $row->kode_kriteria) ?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_kriteria" value="<?= old('kode_kriteria', $row->kode_kriteria) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kriteria" value="<?= old('nama_kriteria', $row->nama_kriteria) ?>" />
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?= old('bobot', $row->bobot) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('kriteria') ?>"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>