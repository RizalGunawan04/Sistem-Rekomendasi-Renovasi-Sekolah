<?php if (session()->get('level') == 'admin' || session()->get('level') == 'user') : ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= site_url('kriteria') ?>">Data Kriteria</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_var("SELECT COUNT(*) FROM tb_kriteria") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-th fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a href="<?= site_url('sekolah') ?>">Data Sekolah</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_var("SELECT COUNT(*) FROM tb_sekolah") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-th-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <a href="<?= site_url('penilaian') ?>">Data Penilaian</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_var("SELECT COUNT(*) FROM tb_sekolah") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pen fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                <a href="<?= site_url('hitung') ?>">Data Perhitungan</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_var("SELECT COUNT(*) FROM tb_sekolah") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="text-center">
    <h2>Selamat Datang</h2>
    <h2>Silahkan isikan kerusakan sekolah di menu profil!</h2>
    </div>
<?php endif ?>