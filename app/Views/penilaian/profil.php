<div class="row">
    <div class="col-sm-6">
        <?= show_msg() ?>
        <?= print_error() ?>
        <form method="post" action="<?= site_url('penilaian/profil_update') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_sekolah" value="<?= old('kode_sekolah', $sekolah->kode_sekolah) ?>" readonly />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_sekolah" value="<?= old('nama_sekolah', $sekolah->nama_sekolah) ?>" />
            </div>
            <div class="form-group">
                <label>Bangunan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ket_sekolah" value="<?= old('ket_sekolah', $sekolah->ket_sekolah) ?>" />
            </div>
            <div class="form-group">
                <label>Bukti <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="bukti" />
                <p class="form-text">Format *.jpg, *.docx, *.pdf. Wajib untuk mengupload bukti kerusakan!</p>
                <p>Bukti: <?= get_file_link('bukti/', $sekolah->bukti) ?></p>
            </div>
            <?php foreach ($penilaian as $key => $val) : ?>
                <div class="form-group">
                    <label><?= $kriteria[$val->kode_kriteria]->nama_kriteria ?> <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nilai[<?= $val->ID ?>]" value="<?= old('nilai.' . $val->ID, $val->nilai) ?>" />
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Total </label>
            <input class="form-control" type="text" name="penilaian_total" value="<?= old('penilaian_total', $sekolah->penilaian_total) ?>" readonly />
        </div>
        <div class="form-group">
            <label>Tingkat Kerusakan </label>
            <input class="form-control" type="text" name="tingkat_kerusakan" value="<?= old('tingkat_kerusakan', $sekolah->tingkat_kerusakan) ?>" readonly />
        </div>
        <div class="form-group">
            <label>Keterangan Hasil </label>
            <input class="form-control" type="text" name="ket_hasil" value="<?= old('ket_hasil', $sekolah->ket_hasil) ?>" readonly />
        </div>
    </div>
</div>