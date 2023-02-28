<div class="row">
    <div class="col-sm-6">
        <?= print_error() ?>
        <form method="post" action="<?= site_url('penilaian/update/' . $sekolah->kode_sekolah) ?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_sekolah" value="<?= old('kode_sekolah', $sekolah->kode_sekolah) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_sekolah" value="<?= old('nama_sekolah', $sekolah->nama_sekolah) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Bangunan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ket_sekolah" value="<?= old('ket_sekolah', $sekolah->ket_sekolah) ?>" readonly />
            </div>
            <?php foreach ($penilaian as $key => $val) : ?>
                <div class="form-group">
                    <label><?= $kriteria[$val->kode_kriteria]->nama_kriteria ?> <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nilai[<?= $val->ID ?>]" value="<?= old('nilai.' . $val->ID, $val->nilai) ?>" />
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('sekolah') ?>"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>