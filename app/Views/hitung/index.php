<script src="<?= base_url('assets/highcharts/highcharts.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/modules/exporting.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/modules/export-data.js ') ?>"></script>
<script src="<?= base_url('assets/highcharts/modules/accessibility.js') ?>"></script>

<div class="card mb-3">
    <div class="card-header">
        <strong>Data Kriteria</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Bobot</th>
                    <th>Bobot Normal</th>
                </tr>
            </thead>
            <?php foreach ($maut->bobot_normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $kriteria[$key]->nama_kriteria ?></td>
                    <td><?= $maut->bobot[$key] ?></td>
                    <td><?= round($maut->bobot_normal[$key], 4) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <strong>Matriks Keputusan</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($penilaian as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $sekolah[$key]->nama_sekolah ?></td>
                    <td><?= $sekolah[$key]->ket_sekolah ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?>%</td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <strong>Matriks Keputusan Ternomalisasi</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($maut->normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <strong>Nilai Preferensi</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0 text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($maut->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <strong>Perangkingan</strong>
    </div>
    <div class="table-responsive">
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
            <?php foreach ($maut->rank as $key => $val) : ?>
                <tr>
                    <td><?= $val ?></td>
                    <td><?= $key ?></td>
                    <td><?= $sekolah[$key]->nama_sekolah ?></td>
                    <td><?= $sekolah[$key]->ket_sekolah ?></td>
                    <td><?= round($maut->total[$key], 4) ?></td>
                    <td><?= round($sekolah[$key]->penilaian_total, 4) ?></td>
                    <td><?= $sekolah[$key]->tingkat_kerusakan ?></td>
                    <td><?= $sekolah[$key]->ket_hasil ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <strong>Grafik</strong>
    </div>
    <div class="card-body">
        <div id="container"></div>
        <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Hasil Rekomendasi'
                },
                xAxis: {
                    categories: <?= json_encode($categories) ?>,
                    crosshair: true
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Total Nilai Preferensi'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.4f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Sekolah',
                    data: <?= json_encode($series) ?>

                }]
            });
        </script>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary" href="<?= site_url('hitung/cetak') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
    </div>
</div>